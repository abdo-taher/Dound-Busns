<?php

namespace App\Http\Controllers\ClubDashboard;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Carbon\Carbon;
use Illuminate\Http\Request;


class AuthController extends Controller
{
    protected $userRepository;



    public function create()
    {
        return view('club-dashboard.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in club
        if (auth('club')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $club = auth('club')->user();
            $subscription = $club->subscriptions()->latest()->first();
            if ( $club->is_active == true && $subscription && $subscription->is_active == true &&  ($subscription->end_date === null || Carbon::parse($subscription->end_date)->isFuture())) {
                return redirect()->intended(route('club.dashboard.index'))->with('success', 'تم تسجيل الدخول بنجاح');
            }elseif( $club->is_active == true && !$subscription ){
                return redirect()->intended(route('club.dashboard.index'))->with('success', 'تم تسجيل الدخول بنجاح');
            } else {
                auth('club')->logout();
                return redirect()->back()->withErrors(['password' => 'Your subscription is either inactive or expired.']);
            }
            // return redirect()->intended(route('club.dashboard.index'))->with('success', 'تم تسجيل الدخول بنجاح');
        }

        // Neither club nor regular user authenticated
        return redirect()->back()->withInput($request->only('password'))->withErrors([
            'password' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
        ]);
    }


    public function logout(Request $request)
    {
        auth('club')->logout();
        return redirect()->route('club.login');
    }

    public function setting()
    {
        $data = Club::find(auth("club")->id());
        return view("club-dashboard.clubs.setting", compact("data"));
    }


    public function update_setting(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password' => 'nullable|string|min:8',
        ]);
        $club =Club::find(auth("club")->id());
        $data = $request->except('password', 'img');

        $data['password'] = $request->password ? bcrypt($request->password) : $club->password;

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "users");
        }
        $club->update($data);
        return redirect()->back()->with('success', __('models.edited_successfully'));
    }




}
