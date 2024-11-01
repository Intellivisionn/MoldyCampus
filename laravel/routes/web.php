<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Courses;

Route::get('/', function () {
    return view('homepage-unsigned');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/test', Courses::class);
