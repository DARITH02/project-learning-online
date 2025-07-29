<?php

use App\Http\Controllers\Api\CategroyController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [HomeController::class, 'index']);
Route::get('/aa', [GoogleLoginController::class,'']);

Route::post('/registration', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);

// route registration google
Route::post('/google-registration', [GoogleLoginController::class, 'register']);


Route::post('/google-login', [GoogleLoginController::class, 'login']);




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
        // Route::post('/purchases', [PurchaseController::class, 'store']);
        Route::get('/purchases', [PurchaseController::class, 'index']);
    });

