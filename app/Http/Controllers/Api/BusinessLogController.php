<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessLog;

class BusinessLogController extends Controller
{
    public function index()
    {
        $businessLogs = BusinessLog::all();

        return response()->json(['message' => 'Success', 'data' => $businessLogs], 200);
    }

    public function store(Request $request)
    {
        // validasi
        try {
            $request->validate([
                'user_id' => 'required|exists:users,id',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
                'sales' => 'required|numeric|min:0',
                'latitude' => 'required|numeric',
                'longitude' => 'required|numeric',

                'type_ids' => 'required|array',
                'type_ids.*' => 'exists:business_types,id',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['message' => 'Validation failed', 'errors' => $e->errors()], 422);
        }

        $log = BusinessLog::create($request->only(['user_id', 'start_date', 'end_date', 'sales', 'latitude', 'longitude']));

        $log->types()->attach($request->input('type_ids'));

        if (!$log) {
            return response()->json(['message' => 'Failed to create business log'], 500);
        }

        return response()->json(['message' => 'Business log created', 'data' => $log], 201);
    }

    public function show($id)
    {
        $businessLog = BusinessLog::find($id);

        if (!$businessLog) {
            return response()->json(['message' => 'Business log not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $businessLog], 200);
    }    
}
