<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'identifier' => 'required',
            'type' => 'required_with:identifier|in:email,username',
            'password' => 'required',
        ]);

        if ($credentials['type'] === 'email') {
            $credentials['email'] = $credentials['identifier'];
        } else {
            $credentials['username'] = $credentials['identifier'];
        }

        $credentials = array_filter($credentials, function ($key) {
            return in_array($key, ['email', 'username', 'password']);
        }, ARRAY_FILTER_USE_KEY);

        if (!Auth::attempt($credentials)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ], 200);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}