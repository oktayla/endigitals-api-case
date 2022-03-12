<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller {
    
    public function login(LoginRequest $request) {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();
        
        if( !$user || !Hash::check($data['password'], $user->password) ) {
            return response()->json([
                'success' => false,
                'message' => 'Bad credentials'
            ], 401);
        }

        $token = $user->createToken('myapp-token')->plainTextToken;

        $data = new UserResource($user);

        $response = [
            'success' => true,
            'user' => $data,
            'token' => $token,
        ];

        return response()->json($response);
    }

    public function register(RegisterRequest $request) {
        $data = $request->validated();
            
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $user->createToken('myapp-token')->plainTextToken;

        $data = new UserResource($user);

        $response = [
            'success' => true,
            'user' => $data,
            'token' => $token
        ];

        return response()->json($response, 201);
    }

    public function me(Request $request) {
        return new UserResource($request->user());
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'User logged out.'
        ]);
    }

}
