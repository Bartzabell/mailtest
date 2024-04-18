<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && !$request->user()->hasVerifiedEmail()) {
            return $next($request);
        }

        return redirect()->route('user-account.index'); // Redirect to user-account if email is verified
    }
}
