<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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


    public function store(Request $request)
    {
        // 'first_name'
        $cridentials = Validator::make($request->all(), [
            'first_name' => 'required|string|max:20',
            'last_name' => 'required|string|max:20',
            'email' => 'required|email|unique:users,email',
        ]);

        if ($cridentials->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $cridentials->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request['first_name'] . ' ' . $request['last_name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);
        $token = $user->createToken('api-token')->plainTextToken;
     // return response()->json([
    
        return response()->json([
            'success' => true,
            'message' => 'User registered successfully',
            'data' => $user
        ]);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($request['password'], $user['password'])) {
            return response()->json([
                'message' => 'login failed check password and email again.....!',
                'success' => false
            ], 401);
        }

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ]);
    }


    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out from all devices'
        ]);
    }



}
