<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


/**
 * @OA\Info(
 *     title="My Laravel 12 API",
 *     version="1.0.0",
 *     description="OpenAPI documentation for Laravel 12."
 * )
 */
class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="Get all users",
     *     tags={"Users"},
     *     @OA\Response(
     *         response=200,
     *         description="Successful response"
     *     )
     * )
     */
    public function index()
    {
        return response()->json([
            'users' => [
                ['id' => 1, 'name' => 'John Doe'],
                ['id' => 2, 'name' => 'Jane Smith'],
            ]
        ]);
    }
}