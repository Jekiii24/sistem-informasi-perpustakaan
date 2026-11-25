<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BookController;
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
});
Route::resource('members', MemberController::class);
Route::resource('borrowings', BorrowingController::class);
Route::post('borrowings/{borrowing}/return', [BorrowingController::class, 'storeReturn'])->name('borrowings.storeReturn');
Route::get('borrowings/{borrowing}/return', [BorrowingController::class, 'returnBook'])->name('borrowings.returnBook');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});

// Book routes
Route::middleware('auth')->group(function () {
    Route::resource('books', BookController::class);
    // ...
});

// Category routes
Route::middleware('auth')->group(function () {
    Route::resource('categories', CategoryController::class);
});

