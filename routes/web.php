<?php

use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// route user
require __DIR__.'/auth-user.php';
require __DIR__.'/route-user.php';

// route admin
require __DIR__.'/route-admin.php';