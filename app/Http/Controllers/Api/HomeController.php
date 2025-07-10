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
     * @OA\Get(
     *     path="/api/courses",
     *     summary="Get all courses",
     *     tags={"Courses"},
     *     @OA\Response(
     *         response=200,
     *         description="List of all courses"
     *     )
     * )
     */
    public function index()
    {
        $courses = Courses::all();

        return response()->json([
            'success' => true,
            'data' => $courses
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/courses/{id}",
     *     summary="Get a single course by ID",
     *     tags={"Courses"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="Course ID",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Single course"
     *     )
     * )
     */
    public function find_course($id)
    {
        $find_course = Courses::with('video')->find($id);

        return response()->json([
            'success' => true,
            'data' => $find_course
        ]);
    }

    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get all categories",
     *     tags={"Categories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of categories"
     *     )
     * )
     */
    public function show_category()
    {
        $category = Category::all();

        return response()->json([
            'success' => true,
            'data' => $category
        ]);
    }
}
