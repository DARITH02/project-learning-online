<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\PreviewImageController;


use App\Models\Category;
use App\Models\Courses;
use Illuminate\Support\Facades\Route;
use function PHPUnit\Framework\returnValueMap;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('pages.dashbord');
})->name('/');
Route::get('courses', function () {
    return view("chat.chat");
})->name('courses');




//route category
Route::get(
    '/viewcategory',
    [CategoryController::class, "index"]

)->name('viewcategory');
Route::get('/createCategory', [CategoryController::class, 'create'])->name('createCategory');
Route::post('/createCategory', [CategoryController::class, 'store'])->name('createCategory.store');
Route::delete('/deleteCategory/{id}', [CategoryController::class, "destroy"]);
Route::get('/editCate/{id}', [CategoryController::class, 'edit'])->name('editCate');
Route::post('updateCategory', [CategoryController::class, 'update'])->name('updateCategory.update');
Route::post('/search', [CategoryController::class, 'search'])->name('search');





//route courese
// Route::get('/viewCourses', [CoursesController::class, 'index'])->name('viewCourses');
Route::get('/viewCourses', [CoursesController::class, 'index'])->name('viewCourses');
Route::get("/create-courses", [CoursesController::class, 'create'])->name('create-courses');
Route::post("/create-courses", [CoursesController::class, 'store'])->name('create-courses.store');
Route::get('/update-course/{id}', [CoursesController::class, 'edit'])->name('update-course.edit');
Route::post('/update-course/{id}', [CoursesController::class, 'update'])->name('update-course');
// Route::post('preview-img',[CoursesController::class,'preview'])->name('preview-img');
Route::delete('/del-course/{id}', [CoursesController::class, 'destroy'])->name('del-course');















Route::get('/chat', function () {
    return view('chat.chat');
});

Route::post('/chat', [ChatController::class, 'ask'])->name('chat.ask');













//route use with react

// Route::get('/home',fn() =>view('react',['page'=>'home']));
// Route::get('/{any}', fn () => view('react'))->where('any', '.*');

// Route::get('/', [\App\Http\Controllers\controllerFront\CoursesController::class, 'index']);
// Route::get('/', [\App\Http\Controllers\controllerFront\CoursesController::class, 'index']);


Route::get('/course', function () {
    $data = Courses::all();
    $page = 'course';
    return view('react', compact(
        'page',
        'data'
    ));
});
Route::get('/category', function () {
    $page = 'category';
    $data = Category::all();
    return view('react', compact('page', 'data'));
});
// Route::get('/c')

Route::get('/{any}', function () {
    return view('react');
})->where('any', '.*');
