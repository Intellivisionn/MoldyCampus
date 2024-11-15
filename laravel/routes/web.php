<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('homepage');
});

Route::view('discover', 'discover');

Route::view('discoverprofessors', 'discoverProfessors');

Route::view('dashboard', 'homepage')
    ->middleware(['auth', 'verified'])
    ->name('homepage');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::middleware(['auth'])->group(function () {
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

Route::get('course/{courseId}', function ($courseId) {
    return view('course.show', compact('courseId'));
})->name('course.show');

Route::get('professor/{professorId}', function ($professorId) {
    return view('professor.show', compact('professorId'));
})->name('professor.show');

Route::get('/images/courses/{filename}', function ($filename) {
    $path = storage_path('app/public/courses/' . $filename);
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
Route::view('privacy-policy', 'partials.privacy-policy')
    ->name('privacy-policy');

Route::view('tos', 'partials.tos')
    ->name('tos');

Route::view('contact_us', 'partials.contact_us')
    ->name('contact_us');

require __DIR__ . '/auth.php';
