<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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

        // if (Auth::attempt($credential)){
        //     return view('layout.FrontPage');
        // } else {
        //     return redirect("login")->with("error", "Login Failed");
        // }

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
}
