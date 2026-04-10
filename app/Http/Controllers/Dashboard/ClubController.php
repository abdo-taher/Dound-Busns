<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Club;
use App\Models\Admin;
use App\Models\Country;
use App\Models\Package;
use App\Models\Category;
use App\Models\ClubCategory;
use Illuminate\Http\Request;
use App\Models\AdminToClubPayment;
use App\Http\Controllers\Controller;

class ClubController extends Controller
{

    public function index(Request $request)
    {
        $data = Club::get();
        return view("dashboard.clubs.index", compact("data"));
    }


    public function create()
    {
        $categories = Category::all();
        $packages = Package::where("type", "club")->get();
        $countries = Country::all();
        // return $countries;

        return view("dashboard.clubs.create", compact('categories', "packages", 'countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:clubs,email',
            'mobile' => 'required|unique:clubs,mobile',
            'password' => 'required|string|min:8',
            'img' => 'nullable|image',
            'lng' => 'required',
            'lat' => 'required',
            'location' => 'required',
        ]);

        // Prepare the club data
        $data = $request->except('password', 'img');
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "images");
        }

        // Create the club
        $club = Club::create($data);

        $categories = $request->category_id;
        $durations = $request->category_durations;

        // Iterate over each category ID and use the category ID to fetch the corresponding duration
        foreach ($categories as $categoryId) {
            // Ensure that there is a duration for this category
            if (isset($durations[$categoryId]) && !empty($durations[$categoryId])) {
                ClubCategory::create([
                    'club_id' => $club->id,
                    'category_id' => $categoryId,
                    'duration' => $durations[$categoryId], // Use category ID as the key to get the duration
                ]);
            }
        }

        // Handle package subscription if provided
        if ($request->package_id) {
            $package = Package::find($request->package_id);
            $club->subscriptions()->delete();
            $club->subscriptions()->create([
                'amount' => $package->price,
                'package_id' => $request->package_id,
                'start_date' => now(),
                'end_date' => $package->time == -1 ? null : now()->addMonths($package->time),
            ]);
        }

        return redirect(route('clubs.index'))->with('success', __('models.added_successfully'));
    }




    public function show($id)
    {
        $data = Club::find($id);

        return view("dashboard.clubs.show", compact("data"));
    }


    public function edit($id)
    {
        $data = Club::find($id);
        $categories = Category::all();
        $packages = Package::where("type", "club")->get();
        $countries = Country::all();
        return view("dashboard.clubs.edit", compact("data", "categories", "packages",'countries'));
    }


    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|max:15',
            'email' => 'required|email',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8',
            'lng' => 'required',
            'lat' => 'required',
            'location' => 'required',
            // 'category_id' => 'required|array', // Uncomment if you want to ensure categories are provided
            // 'category_durations' => 'required|array', // Ensure durations are provided with categories
        ]);

        // Find the club by its ID
        $club = Club::findOrFail($id);

        // Prepare the data for update, excluding the password and image
        $data = $request->except('password', 'img');

        // Update password only if it's provided
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        } else {
            $data['password'] = $club->password;
        }

        // Handle image upload if provided
        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "users");
        }

        // Update the club with the new data
        $club->update($data);

        // Update club categories and durations
        $categories = $request->category_id;
        $durations = $request->category_durations;

        // Delete the old categories and create new ones
        ClubCategory::where('club_id', $club->id)->delete();

        foreach ($categories as $categoryId) {
            if (isset($durations[$categoryId]) && $durations[$categoryId] !== null) {
                ClubCategory::create([
                    'club_id' => $club->id,
                    'category_id' => $categoryId,
                    'duration' => $durations[$categoryId], // Ensure duration is paired with the correct category
                ]);
            }
        }

        // Handle package subscription if provided
        if ($request->package_id) {
            $package = Package::find($request->package_id);

            if ($package) {
                // Remove previous subscriptions and create a new one
                $club->subscriptions()->delete();
                $club->subscriptions()->create([
                    'amount' => $package->price,
                    'package_id' => $request->package_id,
                    'start_date' => now(),
                    'end_date' => $package->time == -1 ? null : now()->addMonths($package->time),
                ]);
            }
        }

        // Redirect with a success message
        return redirect(route('clubs.index'))->with('success', __('models.edited_successfully'));
    }





    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect(route('clubs.index'))->with('success', __('models.deleted_successfully'));
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;
        // return response()->json(['success' => true ,"ids"=> $ids]);
        foreach ($ids as $id) {
            $admin = Club::find($id);
            if ($admin) {
                $admin->delete();
            }
        }
        return response()->json(['success' => true]);
    }
    public function toggleActivation(Request $request)
    {
        $admin = Club::findOrFail($request->id);
        $admin->is_active = !$admin->is_active;
        $admin->save();

        return response()->json(['success' => true, 'is_active' => $admin->is_active]);
    }
    public function pay(Request $request, $id)
    {
        $request->validate([
            'payment' => 'required|numeric|min:0.01',
        ]);

        $payment = AdminToClubPayment::create([
            'admin_id' => auth("admin")->id(),
            'club_id' => $id,
            'amount' => $request->payment,
            'currency' => $request->currency ?? 'SAR',
        ]);

        $club = Club::find($id);
        $club->balance -= $request->payment;
        $club->save();

        return redirect(route('clubs.index'))->with('success', __('models.paid_successfully'));
    }
}
