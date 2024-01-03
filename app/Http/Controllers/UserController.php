<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function getLoginPage() {
        return view('Login');
    }

    public function getRegisterPage() {
        return view('Register');
    }

    public function getHomePage() {
        return view('layout.Home');
    }

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

        if (Auth::attempt($credential)){
            return view('layout.FrontPage');
        } else {
            return redirect("login")->with("error", "Login Failed");
        }

        return view("Home");
    }

    public function registerProcess(Request $request)
    {
        $credential = [
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'role' => $request->role,
        ];

        $request->validate([
            'username' => 'required|string',
            'name' => 'required|string',
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'phone_number' => 'required|digits:9',
        ]);

        if (Auth::attempt($credential)){
            return view('layout.FrontPage');
        } else {
            return redirect("login")->with("error", "Login Failed");
        }

        return view("Home");
    }
}
