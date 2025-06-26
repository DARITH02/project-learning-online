<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class CoursesController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return view('pages.courses.coursesList')->renderSections()['contents'];
        }

        return view('pages.courses.coursesList');
    }
    public function create(Request $request)
    {
        $category=Category::all();
        if ($request->ajax()) {
            return view('pages.courses.formCreate',compact('category'))->renderSections()['contents'];
        }
        return view('pages.courses.formCreate',compact('category'));

    }
    public function store(Request $request)
    {
        return response()->json($request);
    }



}
