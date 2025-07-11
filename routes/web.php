<?php

use App\Http\Controllers\ChatController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/chat/{user}', [ChatController::class, 'viewPage'])->middleware(['auth', 'verified'])->name('chat');

Route::resource('messages/{user}', ChatController::class, ['only' => ['index', 'store']])->middleware(['auth']);


require __DIR__.'/auth.php';
