<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BusinessLogController;

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);

Route::get('/business-logs', [BusinessLogController::class, 'index']);
Route::get('/business-logs/{id}', [BusinessLogController::class, 'show']);
Route::post('/business-logs', [BusinessLogController::class, 'store']);