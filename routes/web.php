<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;


Route::get('/', DashboardController::class . '@index')->name('dashboard');

// Department
Route::resource('departments', DepartmentController::class)->except(['show']);

Route::resource('categories', CategoryController::class)->except(['show']);
