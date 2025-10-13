<?php

use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contacttest', function () {
    $welcomeText = "Hi";
    $company = 'Hogeschool Rotterdam';
    return view('contact', compact('welcomeText'), [
        'company' => $company
    ]);
})->name('contact');

Route::get('artists/{id}', function (int $id) {
    return view('artists', compact('id'));
})->name('artists');

Route::get('homepage/{id}', function (int $id) {
    return view('homepage', compact('id'));
})->name('homepage');

Route::resource('artists', ArtistController::class);

require __DIR__ . '/auth.php';
