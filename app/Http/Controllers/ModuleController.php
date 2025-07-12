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
                    'course_id' => $request['course'],
                    'title' => $request['title']
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



    public function edit($id)
    {
        $title = 'modules';

        $module = Courses::with('modules')->findOrFail($id);

        // $module = Module::findOrFail($id);

        if (request()->expectsJson()) {

            return view('pages.modules.editModules', compact(['title', 'module']))->renderSections()['contents'];

        }
        return view('pages.modules.editModules', compact(['title', 'module']));

    }

    public function update(Request $request)
    {
      
        $cridentials=$request->validate([
            'title'=> 'required|string|max:255',
        ]);
        try {
            $module = Module::findOrFail($request->id);

            $module->update($cridentials);

            return response()->json([
                'success' => true,
                'message' => 'Module updated successfully!',
                'data' => $module
            ]);

        } catch (\Exception $e) {
            Log::error('Module update failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to update module.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $module = Module::findOrFail($id);
            $module->delete();

            return response()->json([
                'success' => true,
                'message' => 'Module deleted successfully!'
            ]);

        } catch (\Exception $e) {
            Log::error('Module deletion failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Failed to delete module.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }





}