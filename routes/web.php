<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::get('/book/{book:title}', [BookController::class, 'show']);

Route::middleware('guest')->group(function () {

    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class,'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('/book', [LoanController::class, 'store']);
    Route::get('/my-loans', [LoanController::class, 'show'])->name('my-loans');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

require __DIR__.'/auth.php';
