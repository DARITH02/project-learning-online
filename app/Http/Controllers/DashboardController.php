<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countCourses = Courses::count();
        return view('pages.dashbord', compact(['countCourses']));
    }
}
