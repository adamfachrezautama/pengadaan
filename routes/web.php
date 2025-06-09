<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


// Protected Routes
Route::middleware('auth')->group(function () {

    // User
    Route::resource('users', UserController::class)->except(['show'])->names('users');

    // Department
    Route::resource('departments', DepartmentController::class)->except(['show'])->names('departments');

    // Category
    Route::resource('categories', CategoryController::class)->except(['show'])->names('categories');

    // Items
    Route::resource('items', ItemsController::class)->names('items');

    // Submission (user)
    Route::resource('submissions', SubmissionController::class)->except(['edit', 'update'])->names('submissions');

    // Admin-only: submission approval
    Route::middleware([IsAdmin::class])->group(function () {
        Route::patch('/submissions/{submission}/approve', [SubmissionController::class, 'approve'])->name('submissions.approve');
        Route::patch('/submissions/{submission}/reject', [SubmissionController::class, 'reject'])->name('submissions.reject');
    });
});
