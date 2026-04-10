<?php

namespace App\Http\Controllers\ClubDashboard;

use App\Http\Controllers\Controller;
use App\Models\TypeCategory;
use App\Models\Club;
use App\Models\Club\Branch;
use Illuminate\Http\Request;

class TypeCategoryController extends Controller
{
    public function index(Request $request)
    {
        // Get the current club's ID
        $clubId = auth('club')->id();

        // Fetch branches of the current club
        $branches = Branch::where('club_id', $clubId)->get();

        // Check if the club has branches
        if ($branches->isEmpty()) {
            return response()->json([
                'status' => 404,
                'message' => 'No branches found for this club'
            ], 404);
        }

        // Get the branch IDs
        $branchIds = $branches->pluck('id');

        // Fetch TypeCategory records associated with the branches
        $data = TypeCategory::whereIn('branch_id', $branchIds)->get();

        // Retrieve the club to get currency information
        $club = Club::find($clubId);
        if (!$club) {
            return response()->json([
                'status' => 404,
                'message' => 'Club not found'
            ], 404);
        }

        // Get the currency and exchange rate for the club
        $currency = $club->country->currency ?? null;
        $exchangeRate = $currency ? $currency->exchange_rate : 1;

        // Convert prices to the club's currency
        $data = $data->map(function ($item) use ($exchangeRate) {
            $item->price_in_local_currency = $item->price * $exchangeRate;
            return $item;
        });

        // Return data or pass to view
        return view('club-dashboard.type_category.index', compact('data', 'currency'));
    }

    public function create()
    {
        $categories = auth('club')->user()->categories;
        $clubId = auth('club')->id();
        $branches = Branch::where('club_id', $clubId)->get();    
        return view('club-dashboard.type_category.create', compact('categories','branches'));
    }

    public function store(Request $request)
    {
        // return $request ;
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'size' => 'required',
            'type' => 'required',
            'grass_type' => 'required',
            'img' => 'required|image',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        $data = $request->all();
        $data['club_id'] = auth('club')->id();

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), 'typeCategories');
        }

        TypeCategory::create($data);

        return redirect()->route('club.type_category.index')
                         ->with('success', __('models.added_successfully'));
    }

    public function show($id)
    {
        $clubId = auth('club')->id();
        $club = Club::with(['country.currency'])->find($clubId);

        if (!$club) {
            return response()->json([
                'status' => 404,
                'message' => 'Club not found'
            ], 404);
        }

        $currency = $club->country->currency ?? null;
        $exchangeRate = $currency ? $currency->exchange_rate : 1;

        $data = TypeCategory::where('club_id', $clubId)->findOrFail($id);
        $data->price_in_local_currency = $data->price * $exchangeRate;

        return view('club-dashboard.type_category.show', compact('data', 'currency'));
    }

    public function edit($id)
    {
        $data = TypeCategory::where('club_id', auth('club')->id())->findOrFail($id);
        $categories = auth('club')->user()->categories;

        return view('club-dashboard.type_category.edit', compact('categories', 'data'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'size' => 'required',
            'grass_type' => 'required',
            'img' => 'nullable|image',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        $model = TypeCategory::where('club_id', auth('club')->id())->findOrFail($id);

        $data = $request->all();
        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), 'typeCategories');
        }

        $model->update($data);

        return redirect()->route('club.type_category.index')
                         ->with('success', __('models.edited_successfully'));
    }

    public function destroy($id)
    {
        $model = TypeCategory::where('club_id', auth('club')->id())->findOrFail($id);
        $model->delete();

        return redirect()->route('club.type_category.index')
                         ->with('success', __('models.deleted_successfully'));
    }

    public function deleteSelected(Request $request)
    {
        $ids = $request->ids;

        foreach ($ids as $id) {
            $model = TypeCategory::where('club_id', auth('club')->id())->find($id);
            if ($model) {
                $model->delete();
            }
        }

        return response()->json(['success' => true]);
    }
}
