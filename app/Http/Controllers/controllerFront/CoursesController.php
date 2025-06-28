<?php

namespace App\Http\Controllers\controllerFront;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Courses::all();
        return view('react', [
            'page' => 'course',
            'data' => $courses
        ]);
    }
}
