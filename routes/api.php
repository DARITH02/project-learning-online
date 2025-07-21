<?php

use App\Http\Controllers\Api\CategroyController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [HomeController::class, 'index']);

Route::post('/registration', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);


// routes/api.php
Route::get('/cart', function () {
    return response()->json(['cart' => [1, 2, 3]]);
});



// Route::get('/view-course/{id}', [HomeController::class, 'find_course']);
// Route::get("/view-category", [HomeController::class, 'show_category']);

// Route::get('/users', [UserController::class, 'index']);

Route::get('/courses', [HomeController::class, 'index']);
Route::get('/view-courses/{id}', [HomeController::class, 'find_course']);
Route::get('/categories', [HomeController::class, 'show_category']);

//getCategory
Route::get('/get-category', [CategroyController::class, 'getCategory']);
Route::get('/get-course-by-category/{id}/courses', [CategroyController::class, 'getCourseByCategory']);






Route::middleware('auth:sanctum')->group(function () {
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/logout', [UserController::class, 'logout']);
});

