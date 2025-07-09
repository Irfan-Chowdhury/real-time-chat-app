<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [ChatController::class, 'users']);
    Route::get('/messages/{userId}', [ChatController::class, 'messages']);
    Route::post('/messages', [ChatController::class, 'sendMessage']);
});
