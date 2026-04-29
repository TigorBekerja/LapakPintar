<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BusinessType;

class BusinessTypeController extends Controller
{
    public function index()
    {
        $businessTypes = BusinessType::all();

        return response()->json(['message' => 'Success', 'data' => $businessTypes], 200);
    }
    
    public function show($id)
    {
        $businessType = BusinessType::find($id);

        if (!$businessType) {
            return response()->json(['message' => 'Business type not found'], 404);
        }

        return response()->json(['message' => 'Success', 'data' => $businessType], 200);
    }
}
