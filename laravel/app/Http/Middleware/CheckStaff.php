<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckStaff
{
    // This middleware checks if the user is a staff member (or admin) by checking its access level in the database. 
    // If the user is a staff member, the request is passed to the next step.
    // If the user is not a staff member, the user is redirected to the unauthorized route.
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->access_level >= 2) {
            return $next($request);
        } else {
            return redirect()->route('unauthorized');
        }
    }
}
