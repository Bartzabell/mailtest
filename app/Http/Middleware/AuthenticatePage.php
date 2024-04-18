<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthenticatePage
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            // User is not logged in
            Session::flash('warning', 'You must log in before accessing this page.');
            return redirect()->route('index'); // Replace 'login' with your login route name
        }

        return $next($request);
    }
}
