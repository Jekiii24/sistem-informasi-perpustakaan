<?php

declare(strict_types=1);

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes (public)
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('books', BookController::class);
    Route::resource('members', MemberController::class);
    Route::resource('borrowings', BorrowingController::class);
    Route::post('borrowings/{borrowing}/return', [BorrowingController::class, 'storeReturn'])->name('borrowings.storeReturn');
    Route::get('borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.returnBook');
});

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});
