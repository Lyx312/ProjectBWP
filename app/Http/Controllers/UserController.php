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

        if (Auth::attempt($credential)){
            return view('layout.FrontPage');
        } else {
            return redirect("login")->with("error", "Login Failed");
        }

        return  view("Home");
    }
}
