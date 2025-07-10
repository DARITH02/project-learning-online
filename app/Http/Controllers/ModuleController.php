<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    public function index()
    {
        $title = 'modules';

        $courses = Courses::all();


        if (request()->expectsJson()) {

            return view('pages.modules.views_modules', compact(['title', 'courses']))->renderSections()['contents'];

            // return response()->json([
            //     'title' => $title,
            //     'html' => $sections['contents'] ?? '',
            // ]);
        }

        return view('pages.modules.views_modules', compact(['title', 'courses']));


    }


    public function show()
    {
        $title = 'modules';

        $courses = Courses::all();

        if (request()->expectsJson()) {

            return view('pages.modules.form_create', compact(['title', 'courses']))->renderSections()['contents'];

        }
        return view('pages.modules.form_create', compact(['title', 'courses']));


    }


    public function store(Request $request)
    {

        try {
            // dd($request->all());
            // 🔐 Validate input
            // $validated = $request->validate([
            //     'name' => 'required|string|max:255',
            //     'description' => 'nullable|string',
            // ]);

            // 💾 Create and save to database
            $module = Module::create(

                [
                    'course_id'=>$request['course'],
                    'title'=>$request['title']
                ]
            );

            // ✅ Return success response
            return response()->json([
                'success' => true,
                'message' => 'Module created successfully!',
                'data' => $module
            ]);

        } catch (\Exception $e) {
            // ❌ Log error for debugging (optional)
            Log::error('Module creation failed: ' . $e->getMessage());

            // 🚫 Return error response
            return response()->json([
                'success' => false,
                'message' => 'Failed to create module.',
                'error' => $e->getMessage(), // You can remove this in production
            ], 500);
        }



    }





}
