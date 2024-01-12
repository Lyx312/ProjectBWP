<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function banUser($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user) {
            // Handle the case where the user is not found
            // You can redirect back with an error message or do other actions
            return redirect()->back()->with('error', 'User not found.');
        }

        // Toggle the is_banned status
        $user->is_banned = ($user->is_banned == 1) ? 0 : 1;
        $user->save();

        $action = ($user->is_banned == 1) ? 'banned' : 'unbanned';

        return redirect()->back()->with('success', "User '$username' has been $action successfully.");
    }

    public function getReportPage()
    {
        $param["order"] = Order::all();
        $customers = User::whereHas('Order')->with('Order')->get();

        $param["customers"] = $customers;

        return view('Report', $param);
    }
    public function filter(Request $req) {
        if ($req->filter != -1) {
            $daftarUser = User::all()->where('role', '=', $req->filter);
        } else {
            $daftarUser = User::all();
        }
        $param["daftarUser"] = $daftarUser;
        return view("Admin", $param);
    }
}
