<?php

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
Route::get('/viewsCourses',[CoursesController::class,'index'])->name('viewsCourses');




Route::get('/chat', function () {
    return view('chat.chat');
});

Route::post('/chat', [ChatController::class, 'ask'])->name('chat.ask');