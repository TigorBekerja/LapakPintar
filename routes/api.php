<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BusinessLogController;
use App\Http\Controllers\Api\BusinessTypeController;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/business-logs', [BusinessLogController::class, 'index']);
Route::get('/business-logs/{id}', [BusinessLogController::class, 'show']);
Route::post('/business-logs', [BusinessLogController::class, 'store']);
Route::get('/business-logs/user/{userId}', [BusinessLogController::class, 'showByUser']);
Route::put('/business-logs/{id}', [BusinessLogController::class, 'update']);
Route::delete('/business-logs/{id}', [BusinessLogController::class, 'destroy']);

Route::get('/business-types', [BusinessTypeController::class, 'index']);
Route::get('/business-types/{id}', [BusinessTypeController::class, 'show']);
