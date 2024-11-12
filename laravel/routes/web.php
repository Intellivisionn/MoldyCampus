<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('homepage');
});

Route::view('discover', 'discover');

Route::view('discoverprofessors', 'discoverProfessors');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('course', 'course');

Route::view('professor', 'professor');

Route::get('/images/courses/{filename}', function ($filename) {
    $path = storage_path('app/public/courses/'.$filename);
    $defaultPath = storage_path('app/public/courses/no-image.jpg');

    if (! File::exists($path)) {
        $path = $defaultPath;
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);

    return $response;
});

Route::get('/images/courses', function () {
    abort(404, 'Filename not provided');
});

require __DIR__.'/auth.php';
