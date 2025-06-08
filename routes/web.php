<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ItemsController;
use Illuminate\Support\Facades\Route;


Route::get('/', DashboardController::class . '@index')->name('dashboard');

// Department
Route::resource('departments', DepartmentController::class)->except(['show'])->names([
    'index' => 'departments.index',
    'create' => 'departments.create',
    'store' => 'departments.store',
    'edit' => 'departments.edit',
    'update' => 'departments.update',
    'destroy' => 'departments.destroy'
]);

Route::resource('categories', CategoryController::class)->except(['show'])->names([
    'index' => 'categories.index',
    'create' => 'categories.create',
    'store' => 'categories.store',
    'edit' => 'categories.edit',
    'update' => 'categories.update',
    'destroy' => 'categories.destroy'
]);

Route::resource('items', ItemsController::class)->names([
    'index' => 'items.index',
    'create' => 'items.create',
    'store' => 'items.store',
    'edit' => 'items.edit',
    'update' => 'items.update',
    'destroy' => 'items.destroy',
    'show' => 'items.show'
]);
