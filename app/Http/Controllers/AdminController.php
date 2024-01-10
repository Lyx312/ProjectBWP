<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
