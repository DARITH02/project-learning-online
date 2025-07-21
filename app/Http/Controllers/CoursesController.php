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
        $data = Courses::with(['category', 'modules'])->withCount('modules')->get();

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

                'category' => 'required|exists:categories,id',
                // 'description' => 'nullable|string',
                // 'level' => 'nullable|string',
                // 'status' => 'required|in:active,inactive',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $path = $request->file('image')->store('images', 'public');

            $course = Courses::create([
                'cate_id' => $validated['category'],
                'title' => $validated['title'],
                'price' => $validated['price'],
                'status' => $request['status'],
                'level' => $request['level'],
                'description' => $request['description'],
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


    }
    public function edit($id)
    {
        $find = Courses::with('category:id,title')->find($id);
        // $data = Courses::select('status', 'level')->get();
        $category = Category::lazy();
        if (request()->ajax()) {
            return view('pages.courses.formUpdate', compact(['find', 'category']))->renderSections()['contents'];
        }
        return view('pages.courses.formUpdate', compact(['find', 'category']));
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
            'level' => $request['level'],
            'cate_id' => $request['category'],
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
