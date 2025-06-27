<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Courses;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;
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


        try {
            $validated = $request->validate([
                'title' => 'required|unique:courses,title',
                'price' => 'required|numeric',
                // 'status' => 'required|in:active,inactive',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $path = $request->file('image')->store('images', 'public');

            $course = Courses::create([
                'title' => $validated['title'],
                'price' => $validated['price'],
                'status' => $request['status'],
                'thumbnail' => $path,
            ]);

            return response()->json([
                'message' => 'Course created successfully.',
                'data' => $course,
            ], 200);


        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed empty fields.',
                'errors' => $e->errors()
            ], 422);

        } catch (\Throwable $e) {
            \Log::error('Course creation error: ' . $e->getMessage());

            return response()->json([
                'message' => 'Something went wrong. Please try again.'
            ], 500);
        }

        // $credentials = $request->validate([
        //     'title' => 'required|unique:courses,title',
        //     'price' => 'required|numeric',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        // ]);
        // $image = $request->file('image');
        // // $imageName=time().'_'. uniqid().$image->getClientOriginalName();
        // $path = $image->store("images", "public");


        // $create = Courses::create([
        //     'title' => $request['title'],
        //     'price' => $request['price'],
        //     'status' => $request['status'],
        //     'thumbnail' => $path
        // ]);

        // return response()->json($create);
    }
    public function edit($id)
    {
        $find = Courses::findOrFail($id);
        if (request()->ajax()) {
            return view('pages.courses.formUpdate', compact('find'))->renderSections()['contents'];
        }
        return view('pages.courses.formUpdate', compact('find'));

    }

    public function update(Request $request, $id)
    {
        $findData = Courses::findOrFail($id);

        try {
            $credentials = $request->validate([
                'title' => 'required|unique:courses,title,' . $id, // ignore current record for unique
                'price' => 'required|numeric',
                // 'status' => 'required|in:active,inactive',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);
        } catch (ValidationException $e) {
            // Return JSON with errors if validation fails
            return response()->json([
                'errors' => $e->errors(),
                'message' => 'Validation failed',
            ], 422);
        }




        // $credentials = $request->validate([
        //     'title' => 'required|unique:courses,title',
        //     'price' => 'required|numeric',
        //     'image' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        // ]);
        $path = $findData['thumbnail'];

        if ($request->hasFile('image')) {

            if ($request['old_thumbnail'] && Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
            $image = $request->file('image');
            $path = $image->store("images", "public");
        }
        $findData->update([
            'title' => $credentials['title'],
            'price' => $credentials['price'],
            'status' => $request['status'],
            'thumbnail' => $path,

        ]);

        return response()->json(['message' => 'Course updated successfully']);


    }










    public function destroy($id)
    {

        $course = Courses::findOrFail($id);


        try {
            if ($course->thumbnail) {
                // Storage::delete('public/' . $course->thumbnail); // this deletes storage/app/public/images/...
                Storage::disk('public')->delete($course->thumbnail);

            }
            if ($course->delete()) {
                return response()->json(['message' => 'record has been delete successfully ......!', 'data' => $course['title']], 200);
            }
            //code...

        } catch (\Throwable $th) {
            return response()->json(['message' => 'record has been delete successfully ......!', 'data' => $course['title']], 200);

        }




    }







}
