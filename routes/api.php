<?php

use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/add-task', [TaskController::class, 'add']);
Route::get('/get-task', [TaskController::class, 'index']);
Route::get('/filter-task', [TaskController::class, 'search']);
Route::get('/task/{task}', [TaskController::class, 'show']);
Route::patch('/task/{task}', [TaskController::class, 'update']);
Route::delete('/task/{task}', [TaskController::class, 'destroy']);
