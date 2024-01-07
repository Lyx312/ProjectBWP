<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function test() {
        $table = Order::Find(1);
        $test = $table->OrderDetail;
        dd($test);
    }

    public function getLoginPage() {
        Session::forget("isAdmin");
        return view('Login');
    }

    public function getRegisterPage() {
        return view('Register');
    }

    public function getCustomerPage() {
        return view('Customer');
    }

    public function getSellerPage() {
        return view('Seller');
    }

    public function getAdminPage() {
        return view('Admin');
    }

    public function getShopPage()
    {
        return view('layout.Shop');
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

        if ($request->username == "admin" && $request->password == "admin") {
            Session::put('isAdmin', true);
            return redirect('admin');
        } else if (Auth::attempt($credential)){
            if (Auth::user()->role == 0) {
                return redirect('customer');
            } else {
                return redirect('seller');
            }
        } else {
            return redirect("login")->with("error", "Login Failed");
        }

        return view("login");
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'username' => 'required|string|unique:users',
            'name' => 'required|string',
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'phone_number' => 'required|digits:9',
        ]);

        $user = new User([
            'username' => $request->username,
            'name' => $request->name,
            'password' => $request->password,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
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

    public function index(){
        $daftarUser = User::all();    
        $param["daftarUser"] = $daftarUser;
        return view("Admin", $param);
    }
}
