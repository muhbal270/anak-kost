<?php

use App\Http\Controllers\Frontend\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');
    
    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');
    
    Route::post('/login', [AuthController::class, 'login_post'])
        ->name('login.post');
    
    Route::post('/register', [AuthController::class, 'register_post'])
        ->name('register.post');
});

Route::middleware('auth')->group(function (){
    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
