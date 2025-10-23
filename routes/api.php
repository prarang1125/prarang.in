<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\PostApiController;
use App\Http\Controllers\Api\V1\TagApiController;
use App\Services\API\V1\Content\PostService;

Route::prefix('v1')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/posts', [PostApiController::class, 'getPostsByLocation']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
    Route::get('tags',[TagApiController::class,'getTags'])->name('tags');
    Route::get('/daily-posts/list', [PostApiController::class, 'getAllPosts']);
    Route::get('/post', [PostApiController::class, 'getPostById']);


});
