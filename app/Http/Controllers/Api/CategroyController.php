<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Courses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategroyController extends Controller
{
    public function getCategory()
    {
        try {
            $category = Category::all();
            return response()->json([
                'status' => true,
                'message' => 'successfull to fetch categories',

                'data' => $category,
            ], 200);
        } catch (\Exception $e) {
            Log::error("Fail to fetch categories" . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'Fail to fetch categories',
                'error' => $e->getMessage()
            ]);
        }
    }
    public function getCourseByCategory($id)
    {
        try {
            $courses = Courses::where('cate_id', $id)->get();
            if ($courses->isEmpty()) {
                return response()->json([

                    'status' => false,
                    'message' => 'No courses found for this category.',
                    'data' => [],
                ], 404);
            }

            return response()->json([
                'status' => true,
                'message' => 'Courses retrieved successfully.',
                'data' => $courses

            ], 200);
        } catch (\Exception $e) {
            //throw $th;
            Log::error('Error fetching courses by category' . $e->getMessage());
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while fetching courses.',
                'error' => $e->getMessage()
            ]);
        }
    }
}
