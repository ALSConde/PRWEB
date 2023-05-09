<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AuthRestController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    public function login(Request $request)
    {
        $credentials = $request->all(['email', 'password']);

        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json([
                'error' => 'Unauthorized'
            ], 401);
        }

        return $this->respondUserWithToken($token);
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondUserWithToken(auth('api')->refresh());
    }

    public function me()
    {
        return response()->json(auth('api')->user());
    }

    protected function respondUserWithToken($token)
    {
        $user = User::where('id', auth('api')->user()->id);

        return response()->json([
            'user' => $user,
            'token' => $token,
            'token_type' => 'Bearer ',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
        ]);
    }
}
