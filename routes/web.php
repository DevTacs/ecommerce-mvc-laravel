<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->controller(AuthController::class)
->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register','register');
});

Route::middleware('auth')->group(function() {
    Route::resource('products', ProductController::class);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});