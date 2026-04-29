<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(['message' => 'Success', 'data' => $users], 200);
    }

    public function store(Request $request)
    {
        //validasi
        try {
            $request->validate([
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        }
        
        $user = User::create($request->all());

        if (!$user) {
            return response()->json(['message' => 'Failed to create user'], 500);
        }

        return response()->json(['message' => 'User created', 'data' => $user], 201);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $user], 200);
    }
}
