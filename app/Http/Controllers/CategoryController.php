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
    public function show(Request $request, $id)
    {
        if ($request->ajax()) {
            return view('pages.category.editCategory');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
 
        if (request()->ajax()) {

            return view('pages.category.editCategory', compact('category'))->renderSections()['contents'];
        }
        return view('pages.category.editCategory', compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        // $credaintails=$request->validate([
        //     'title'=>'required|unique:cate,column,except,id'
        // ])
        $selectDoubplicate = Category::where('title', $request['title'])->where('description', 'desc')->where('id', '!=', 'id')->first();

        if ($selectDoubplicate != null) {
            return response()->json(['data' => $selectDoubplicate, 'message' => "Category already exist....!"], 422);
        }
        $record = Category::findOrFail($request['id']);
        $record->update($request->all());
        return response()->json(['data' => $record, 'message' => "update successfully....!"], 200);

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
    public function search(Request $request)
    {
        $title = $request->input("title","");
        // $getFilter = Category::where('title', 'LIKE', "%{$title}%")->get();
        $getFilter = Category::where('title', 'LIKE', "%{$title}%")->get();
        if($getFilter){

            return response()->json(['html' => $getFilter]);
        }

    }
}
