<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\KostController;
use App\Http\Controllers\Frontend\OrderController;

Route::middleware('auth')->group(function () {
    Route::get('/kost/detail', [KostController::class, 'kostDetail'])
        ->name('kost.detail');

    Route::get('kost/pesanan', [OrderController::class, 'index'])
        ->name('pesanan.index');
});

Route::get('/kost', [KostController::class, 'index'])
    ->name('kost.index');

Route::get('/kost/area', [KostController::class, 'kostArea'])
    ->name('kost.area');

