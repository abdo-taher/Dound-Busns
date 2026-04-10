<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'mobile' => 'required|numeric|unique:users',
            'password' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $data = $request->except('password', 'img', 'cover_img');
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('img')) {
            $data['img'] = UploadImage($request->file('img'), "users");
        }

        if ($request->hasFile('cover_img')) {
            $data['cover_img'] = UploadImage($request->file('cover_img'), "users");
        }

        $otp = rand(100000, 999999);
        $data['otp'] = $otp;

        $user = User::create($data);
        $responseData = [
            'user' => new UserResource($user),
            'otp' => $otp // For demonstration purposes, include the OTP in the response
        ];

        // In production, you should send the OTP to the user's mobile/email instead of including it in the response

        return sendResponse(200, 'User created successfully. Verify OTP to get access token.', $responseData);
    }



    public function verifyOtp(Request $request)
    {
        $rules = [
            'email_or_mobile' => 'required|string',
            'otp' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loginType = filter_var($request->email_or_mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $user = User::where($loginType, $request->email_or_mobile)->where('otp', $request->otp)->first();

        if ($user) {
            $user->update([
                'otp' => null, // Clear the OTP after verification
                'email_verified_at' => now() // Mark the account as verified
            ]);

            $token = $user->createToken('tokens')->plainTextToken;

            return sendResponse(200, 'OTP verified successfully. Token generated.', ['user' => new UserResource($user), 'token' => $token]);
        } else {
            return sendResponse(403, 'Invalid OTP.');
        }
    }




    public function resendOtp(Request $request)
    {
        $rules = [
            'email_or_mobile' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loginType = filter_var($request->email_or_mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $user = User::where($loginType, $request->email_or_mobile)->first();

        if ($user) {
            $otp = rand(100000, 999999);
            $user->update(['otp' => $otp]);

            // In production, you should send the OTP to the user's mobile/email instead of including it in the response
            return sendResponse(200, 'OTP resent successfully', ['otp' => $otp]);
        } else {
            return sendResponse(403, 'User not found.');
        }
    }



    public function login(Request $request)
    {
        $rules = [
            'email_or_mobile' => 'required|string',
            'password' => 'required|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $loginType = filter_var($request->email_or_mobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
        $user = User::where($loginType, $request->email_or_mobile)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if (!$user->email_verified_at) {
                return sendResponse(403, 'Account not verified.');
            }
            $token = $user->createToken('tokens')->plainTextToken;
            return sendResponse(200, 'Login successful', ['user' => new UserResource($user), 'token' => $token]);
        } else {
            return sendResponse(403, 'Invalid credentials.');
        }
    }
    public function logout(Request $request)
    {
        $user = Auth::user();
        $user->tokens()->delete();

        return sendResponse(200, 'Logged out successfully.');
    }

    public function loginWithGoogle(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'uid' => 'required|string',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return sendResponse(422, "error", $validator->errors()->first());
        }

        $validatedData = $validator->validated();
        $validatedData['type_account'] = "gmail";
        $validatedData['remember_token'] = Str::random(10);
        $validatedData['password'] = Str::random(10); // Use a fixed password or a placeholder

        // Check if the user already exists and was registered with Google
        $user = User::where('uid', $request->uid)
                    ->where('type_account', 'gmail')
                    ->where('email', $request->email)
                    ->first();

        if ($user) {
            // Update the user with Google-specific data if necessary
            $user->update([
                'name' => $request->name,
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        } else {
            // Create a new user
            $user = User::create($validatedData);
        }

        // Generate a new token
        $token = $user->createToken('tokens')->plainTextToken;

        $data = [
            'user' => new UserResource($user),
            'token' => $token
        ];

        return sendResponse(200, 'User logged in successfully', $data);
    }


}
