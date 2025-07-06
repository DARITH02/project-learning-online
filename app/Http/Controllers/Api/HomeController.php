<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Courses::all();

        return response()->json(
            [
                'success' => true,
                'data' => $courses
            ]
        );
    }
    public function find_course($id)
    {
        $find_course = Courses::find($id);
        return response()->json([
            'success' => true,
            'data' => $find_course
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show_category()
    {
        $category = Category::all();

        return response()->json([
            'success' => true,
            'data'=>$category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
