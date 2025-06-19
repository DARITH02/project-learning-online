<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnValueMap;

Route::get('/', function () {
    return view('pages.dashbord');
})->name('/');
Route::get('courses', function () {
    return view("chat.chat");
})->name('courses');



//route courese
Route::get('/viewsCategory', [CoursesController::class, 'index'])->name('viewsCategory');
Route::get('/viewCourses', [CategoryController::class, 'index'])->name('viewCourses');

//route category
Route::get('/viewcategory', [CategoryController::class, 'index'])->name('viewcategory');




Route::get('/chat', function () {
    return view('chat.chat');
});

Route::post('/chat', [ChatController::class, 'ask'])->name('chat.ask');