<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnValueMap;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.dashbord');
})->name('/');
Route::get('courses', function () {
    return view("chat.chat");
})->name('courses');



//route courese
// Route::get('/viewCourses', [CoursesController::class, 'index'])->name('viewCourses');
Route::get('/viewCourses', function () {
    $view = view('pages.courses.coursesList')->renderSections();
    // return view('pages.courses.coursesList');
    return $view['contents'];
});


Route::get('/courses', function (Request $request) {
    if ($request->ajax()) {
        return view('pages.courses.coursesList')->renderSections()['contents'];
    }

    return view('pages.courses.coursesList');
});

//route category
Route::get('/viewcategory',[CategoryController::class,"index"]
    
)->name('viewcategory');
Route::get('/createCategory', [CategoryController::class, 'create'])->name('createCategory');
Route::post('/createCategory', [CategoryController::class, 'store'])->name('createCategory.store');
Route::delete('/deleteCategory/{id}',[CategoryController::class,"destroy"]);




Route::get('/chat', function () {
    return view('chat.chat');
});

Route::post('/chat', [ChatController::class, 'ask'])->name('chat.ask');