<?php

use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/course', [HomeController::class, 'index']);
Route::get('/view-course/{id}', [HomeController::class, 'find_course']);
Route::get("/view-category",[HomeController::class,'show_category']);