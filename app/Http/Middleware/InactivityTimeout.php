<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InactivityTimeout
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $lastActivity = Session::get('last_activity');

        // Check if the user is logged in and there is a recorded last activity time
        if ($user && $lastActivity) {
            $timeout = 3000; // 5 minutes in seconds

            // Calculate the time since the last activity
            $elapsedTime = time() - $lastActivity;

            // If the user has been inactive for more than 5 minutes, log them out
            if ($elapsedTime >= $timeout) {
                Auth::logout();
                Session::flush();
                return redirect('/')->with('logout_message', 'You have been logged out due to inactivity.');
            }
        }

        // Update the last activity time
        Session::put('last_activity', time());

        return $next($request);
    }
}
