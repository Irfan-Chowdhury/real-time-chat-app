<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;



Route::get('/clear-config-cache', function () {
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    return 'Config and cache cleared!';
});


Route::get('/', function () {
    // return view('welcome');
    return Auth::check()
        ? redirect()->back()   // if logged in
        : redirect()->route('login');      // if guest
});


Route::get('/dashboard', function () {
    return view('admin.pages.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__.'/auth.php';
