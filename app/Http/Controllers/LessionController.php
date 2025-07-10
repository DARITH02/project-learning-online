<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Lession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function Pest\Laravel\json;

class LessionController extends Controller
{
    public function create()
    {
        $course = Courses::all();
        $title = 'lession';

        if (request()->ajax()) {
            return view('pages.lession.fromCreateLession', compact('course'))->renderSections()['contents'];
        }
        return view('pages.lession.fromCreateLession', compact(['course', 'title']));

    }
    public function store(Request $request)
    {
        // ✅ Validate video files
        $validator = validator([
            // 'videos' => 'required|array',
            // 'course' => 'required|exists:courses,id',
            'videos.*' => 'file|mimes:mp4,mov,avi,wmv|max:102400', // 
        ]);

        // ❌ Validation failed
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422); // Unprocessable Entity
        }

        // ✅ Process each video file
        $paths = [];
        foreach ($request->file('videos') as $video) {
            // $path = $video->storeAs('videos', $request['course'], 'public');
            // $paths[] = $path;


            $originalName = pathinfo($video->getClientOriginalName(), PATHINFO_FILENAME);
            $extension = $video->getClientOriginalExtension();

            // Sanitize course name and original filename
            $course = preg_replace('/[^a-zA-Z0-9_-]/', '_', $request->input('course') ?? 'default_course');
            $filename = time() . '_' . uniqid() . '_' . preg_replace('/[^a-zA-Z0-9_-]/', '_', $originalName) . '.' . $extension;

            // Store with custom name in a course folder
            $path = $video->storeAs('videos_' . $course, $filename, 'public');

            // Optionally: Save to database

            $paths[] = $path;

            Lession::create([
                'course_id' => $request['course'],
                'video_path' => $path
            ]);
        }

        // ✅ Return success response
        return response()->json([
            'status' => 'success',
            'message' => 'Videos uploaded successfully.',
            'data' => $paths
        ], 200); // Created
    }
}
