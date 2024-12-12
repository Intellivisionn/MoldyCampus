<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->access_level == 3) {
            return $next($request);
        } else {
            return redirect()->route('unauthorized');
        }
    }
}
