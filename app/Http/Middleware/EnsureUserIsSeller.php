<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsSeller
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check() && !Session::Has("isAdmin")) {
            return redirect(route("login-page"))->with("error", "Please login first");
        } else if ((Auth::check() && Auth::user()->role != 1) || (Session::has("isAdmin") && Session::get("isAdmin"))) {
            return back()->with("error", "Unauthorized entry");
        } else {
            return $next($request);
        }
    }
}
