<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;

// Public Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Protected Routes
Route::middleware('auth')->group(function () {

    Route::resource('transactions', TransactionController::class)->names('transactions');

    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');

    // Admin-only: submission approval
    Route::middleware([IsAdmin::class])->group(function () {

    // User
    Route::resource('users', UserController::class)->except(['show'])->names('users');

    // Category
    Route::resource('categories', CategoryController::class)->except(['show'])->names('categories');

    // Items
    Route::resource('items', ItemsController::class)->names('items');

    });
});
