<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'homepage');

Route::view('discover', 'discover');

Route::view('discoverprofessors', 'discoverProfessors');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
