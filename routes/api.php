<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JobPostsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/job-requests', [JobPostsController::class, 'index']);
Route::get('/job-posts/by-category', [JobPostsController::class, 'getByCategory']);
