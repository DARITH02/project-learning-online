<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $categories = Category::all();
        // if ($request->ajax()) {
        //     // Render the Blade view and extract only the 'contents' section
        //     return view('pages.category.categories', compact('categories'))
        //         ->renderSections()['contents'];
        // }

        if ($request->ajax()) {
            return view('pages.category.categories', compact('categories'))->renderSections()['contents'];
        }
        // For normal HTTP requests, return the full view
        return view('pages.category.categories', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        // return view('pages.category.formCreateCategory');

        if ($request->ajax()) {
            return view('pages.category.formCreateCategory')->renderSections()['contents'];
        }

        return view('pages.category.formCreateCategory');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $credentails = $request->validate(['title' => 'required']);
        $category = Category::where('title', $credentails['title'])->first();

        try {
            if ($category != null) {
                return response()->json([
                    'message' => 'Category already exise!',
                    'data' => $category['title'],  // send input data back or saved model data
                ], 409);
            }
            // Your real logic here, e.g., saving category
            $create = Category::create([
                'title' => $credentails['title'],
                'description' => $request['desc']
            ]);
            if ($create) {
                return response()->json([
                    'message' => 'Category saved successfully',
                    'data' => $credentails['title'],  // send input data back or saved model data
                ], 200);
            }

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Error saving category: ' . $e->getMessage(),
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
          $cate = Category::findOrFail($id);

        try {
            if ($cate->delete()) {

                return response()->json([
                    'message' => 'Category deleted successfully.',
                    'data' => $id
                ], 200);
            }
            return response()->json([
                'message' => 'Category deleted faile.',
            ], 400);
        } catch (\Throwable $th) {
            //throw $th;=
            \Log::error('Category delete error: ' . $th->getMessage());

            // Return error response
            return response()->json([
                'message' => 'An error occurred while deleting the category.'
            ], 500);
        }


    }
}
