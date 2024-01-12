<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Review;
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
        ], [
            'username.required' => ':attribute is required.',
            'username.string' => ':attribute must be a string.',
            'password.required' => ':attribute is required.',
            'password.string' => ':attribute must be a string.',
        ], [
            'username' => 'Username',
            'password' => 'Password',
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
            'phone_number' => 'required|numeric|digits_between:9,12',
            'address' => 'required|string',
        ], [
            'username.required' => ':attribute is required.',
            'username.string' => ':attribute must be a string.',
            'username.unique' => ':attribute has already been taken.',
            'display_name.required' => ':attribute is required.',
            'display_name.string' => ':attribute must be a string.',
            'password.required' => ':attribute is required.',
            'password.confirmed' => ':attribute confirmation does not match.',
            'email.required' => ':attribute is required.',
            'email.email' => ':attribute must be a valid email address.',
            'phone_number.required' => ':attribute is required.',
            'phone_number.numeric' => ':attribute must be a number.',
            'phone_number.digits_between' => ':attribute must be between :min and :max digits.',
            'address.required' => ':attribute is required.',
            'address.string' => ':attribute must be a string.',
        ], [
            'username' => 'Username',
            'display_name' => 'Name',
            'password' => 'Password',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'address' => 'Address',
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
                'phone_number' => 'required|numeric|min:9|max:12',
                'address' => 'required|string',
            ],
            [
                'profile_picture.sometimes' => ':attribute may only be included when updating the profile picture.',
                'profile_picture.mimes' => ':attribute must be a file of type: gif, jpg, jpeg, png, webp.',
                'display_name.required' => ':attribute is required.',
                'display_name.string' => ':attribute must be a string.',
                'email.required' => ':attribute is required.',
                'email.email' => ':attribute must be a valid email address.',
                'phone_number.required' => ':attribute is required.',
                'phone_number.numeric' => ':attribute must be a number.',
                'phone_number.digits_between' => ':attribute must be between :min and :max digits.',
                'address.required' => ':attribute is required.',
                'address.string' => ':attribute must be a string.',
            ],
            [
                'profile_picture' => 'Profile Picture',
                'display_name' => 'Name',
                'email' => 'Email',
                'phone_number' => 'Phone Number',
                'address' => 'Address',
            ]
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
                            $fail('The :attribute is incorrect.');
                        }
                    },
                ],
                'password' => 'required|confirmed',
            ],
            [
                'old_password.required' => ':attribute is required.',
                'old_password' => ':attribute is incorrect.',
                'password.required' => ':attribute is required.',
                'password.confirmed' => ':attribute confirmation does not match.',
            ],
            [
                'old_password' => 'Old Password',
                'password' => 'New Password',
            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator, 'changePassword');
        }


        $user->password = $req->password;
        $user->save();

        return redirect('account')->with("success-password", "Successfully changed password");
    }

    public function postReviewProcess(Request $req) {
        $req->validate(
            [
                'review_rating' => 'required',
                'review_text' => 'required',
            ],
            [
                'required' => ':attribute is required.',
            ],
            [
                'review_rating' => 'Rating',
                'review_text' => 'Review',
            ]
        );

        Review::create([
            "review_user" => Auth::user()->username,
            "review_item_id" => $req->review_item_id,
            "review_rating" => $req->review_rating,
            "review_text" => $req->review_text,
        ]);

        return back()->with('success', 'Review posted! Thank you for reviewing this item!');
    }
}
