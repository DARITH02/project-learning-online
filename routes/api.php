<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CategoryController;

// Route::get('/users', [HomeController::class, 'index']);
// Route::get('/view-course/{id}', [HomeController::class, 'find_course']);
// Route::get("/view-category", [HomeController::class, 'show_category']);

// Route::get('/users', [UserController::class, 'index']);

Route::get('/courses', [HomeController::class, 'index']);
Route::get('/courses/{id}', [HomeController::class, 'find_course']);
Route::get('/categories', [HomeController::class, 'show_category']);