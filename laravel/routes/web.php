<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('course', 'course');

Route::view('professor', 'professor');

require __DIR__ . '/auth.php';
