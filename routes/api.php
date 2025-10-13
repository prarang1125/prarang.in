<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PostApiController;
use App\Services\API\V1\Content\PostService;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/posts', [PostApiController::class, 'getPostsByLocation']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});
