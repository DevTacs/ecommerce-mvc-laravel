<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->controller(AuthController::class)
->group(function() {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/register', 'showRegisterForm')->name('register');
    Route::post('/register','register');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth', 'customer'])->group(function() {
    Route::resource('products', ProductController::class);
    Route::resource('cart', CartController::class);
    Route::prefix('cart')->controller(CartController::class)
    ->name('cart.')
    ->group(function() {
        Route::post('/{cartItem}/increment', 'increment')->name('increment');
        Route::post('/{cartItem}/decrement', 'decrement')->name('decrement');
    });
        
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});