<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
class GoogleLoginController extends Controller
{
   public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'google_id' => 'required',
            'name' => 'required|string',
        ]);
        $message='';
        // Find or create the user
        $user = User::where('email', operator: $request['email'])->first();

        if (!$user) {
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'google_id' => $request['google_id'],
                'password' => Hash::make(Str::random(24)), // dummy password
            ]);
            $message = 'User registered and logged in.';
        } else {
            // Update google_id if not yet saved
            if (!$user['google_id']) {
                $user->google_id = $request['google_id'];
                $user->save();
            }
        }

        // Create token
        $token = $user->createToken('google_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    } 
    public function login(Request $request){
            $request->validate([
            'email' => 'required|email',
            'name' => 'required|string',
            'google_id' => 'required|string',
          
        ]);

        $user = User::where('email', $request['email'])->first();

        if (!$user) {
            return response()->json([
                'message' => 'User not registered. Please register first.',
                'name'=>$request['name']
            ], 404);
        }

        // Update avatar and google_id
        $user->update([
            'google_id' => $request['google_id'],
            'avatar' => $request['avatar'],
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
    }
    
}
