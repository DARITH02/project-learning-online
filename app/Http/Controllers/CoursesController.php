<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use function Pest\Laravel\json;

class CoursesController extends Controller
{
    public function index(Request $request)
    {
        $data = Courses::all();
        if ($request->ajax()) {
            return view('pages.courses.coursesList', compact('data'))->renderSections()['contents'];
        }

        return view('pages.courses.coursesList', compact('data'));
    }
    public function create(Request $request)
    {
        $category = Category::all();
        if ($request->ajax()) {
            return view('pages.courses.formCreate', compact('category'))->renderSections()['contents'];
        }
        return view('pages.courses.formCreate', compact('category'));

    }
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title' => 'required|unique:courses,title',
            'price' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);
        $image = $request->file('image');
        // $imageName=time().'_'. uniqid().$image->getClientOriginalName();
        $path = $image->store("images", "public");


        $create = Courses::create([
            'title' => $request['title'],
            'price' => $request['price'],
            'status' => $request['status'],
            'thumbnail' => $path
        ]);




        return response()->json($create);
    }
    // public function preview(Request $request){
    //     if($request->hasFile('img')){
    //         return response()->json($request->all());

    //     }
    // }







}
