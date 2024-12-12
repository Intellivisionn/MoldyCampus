<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    // This middleware checks if the user is an admin by checking its access level in the database. 
    // If the user is an admin, the request is passed to the next step.
    // If the user is not an admin, the user is redirected to the unauthorized route.
    public function handle(Request $request, Closure $next) 
    {
        if (Auth::user() && Auth::user()->access_level == 3) {
            return $next($request);
        } else {
            return redirect()->route('unauthorized');
        }
    }
}
