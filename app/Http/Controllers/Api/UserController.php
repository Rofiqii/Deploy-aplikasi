<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {
    
    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('token')->plainTextToken;
            
            return response()->json([
                'message' => 'Successfully logged in',
                'token' => $token,
                'token_type' => 'Bearer',
                'data' => new UserResource($user)
            ]);
        }
        return response()->json(['error' => 'Invalid email or password'], 401);
    }

    public function getUser(Request $request) {
        $user = $request->user();
        return response()->json([
            'message' => 'User retrieved successfully',
            'data' => new UserResource($user)
        ]);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
