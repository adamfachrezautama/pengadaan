<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;


Route::get('/', DashboardController::class . '@index')->name('dashboard');

// Department

Route::get('/department', DepartmentController::class. '@index')->name('department.index');
Route::get('/department/create', DepartmentController::class. '@create')->name('department.create');
