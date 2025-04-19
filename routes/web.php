<?php

use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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



Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::resource('books', BookController::class);
    Route::resource('users', UserController::class);
});

Route::group(['middleware' => ['auth', 'role:anggota']], function() {
    Route::resource('anggota', AnggotaController::class);
});

require __DIR__.'/auth.php';
