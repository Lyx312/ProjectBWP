<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function loginProcess(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'password' => $request->password
        ];

        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Check if the user is attempting to log in as admin
        if ($request->username == "admin" && $request->password == "admin") {
            Session::put('isAdmin', true);
            return redirect('admin');
        }

        // Regular user login attempt
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return redirect("login")->with("error", "Login Failed");
        }

        // Check if the user is banned
        if ($user->is_banned == 1) {
            return redirect("login")->with("error", "Login Failed. Your account is banned.");
        }

        if (Auth::attempt($credential)) {
            if (Auth::user()->role == 0) {
                return redirect()->intended('/');
            } else {
                return redirect('seller');
            }
        } else {
            return redirect("login")->with("error", "Login Failed");
        }
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'display_name' => 'required|string',
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'phone_number' => 'required|digits:9',
            'address' => 'required|string',
        ]);

        $user = new User([
            'username' => $request->username,
            'display_name' => $request->display_name,
            'password' => $request->password,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'role' => $request->role,
        ]);

        $user->save();

    // Redirect to a success page or do something else
        return redirect()->route('login-page')->with('success', 'Registration successful. Please log in.');
    }

    public function logoutProcess(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Session::forget('isAdmin');
        return redirect("login");
    }

    public function editProfileProcess(Request $req) {
        $user = User::find(auth()->user()->username);

        $validator = Validator::make(
            $req->all(),
            [
                'profile_picture' => "sometimes|mimes:gif,jpg,jpeg,png,webp",
                'display_name' => 'required|string',
                'email' => 'required|email',
                'phone_number' => 'required|digits:12',
                'address' => 'required|string',
            ],
        );

        if ($validator->fails()) {
            return back()->withErrors($validator, 'editProfile');
        }

        if ($req->hasFile('profile_picture')) {
            $imageName = "PP" . ($user->username);
            $imageExtension = $req->profile_picture->extension();
            try {
                Storage::putFileAs('public/ProfilePictures', $req->profile_picture, "$imageName.$imageExtension");
                $user->profile_picture = 'ProfilePictures/' . "$imageName.$imageExtension";
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Error storing profile picture.');
            }
        }

        $user->display_name = $req->display_name;
        $user->email = $req->email;
        $user->phone_number = $req->phone_number;
        $user->address = $req->address;

        $user->save();

        return redirect('account')->with("success-profile", "Successfully edit profile");
    }

    public function changePasswordProcess(Request $req) {
        $user = User::find(auth()->user()->username);

        $validator = Validator::make(
            $req->all(),
            [
                'old_password' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if (!Hash::check($value, Auth::user()->password)) {
                            $fail('The old password is incorrect.');
                        }
                    },
                ],
                'password' => 'required|confirmed',
            ]
        );


        if ($validator->fails()) {
            return back()->withErrors($validator, 'changePassword');
        }

        $user->password = $req->password;
        $user->save();

        return redirect('account')->with("success-password", "Successfully changed password");
    }
}
