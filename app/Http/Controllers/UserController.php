<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    // sementara tidak ada pengecekkan karena database msh tdk tau.
    public function LoginUser(Request $request)
    {
        $user = new User(); // Anda bisa menggunakan model User atau membuat instance User yang fiktif
        $user->username = 'dummy'; // Contoh: set username ke 'dummy'

        // Login berhasil
        session(['user' => $user]); // Menyimpan informasi pengguna ke dalam session

        return  view("Home");
    }
}
