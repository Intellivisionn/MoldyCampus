<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [
        // Custom Middleware
        'checkAdmin' => \App\Http\Middleware\CheckAdmin::class,
        'checkStaff' => \App\Http\Middleware\CheckStaff::class,
    ];
}
