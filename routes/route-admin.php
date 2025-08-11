<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\KostController;
use App\Http\Controllers\Backend\KotaController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\FasilitasController;

Route::middleware(['admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    //--------------------------route kota--------------------------//
    Route::get('/admin/kota', [KotaController::class, 'index'])
        ->name('admin.kota.index');
    
    Route::get('/admin/kota/create', [KotaController::class, 'create'])
        ->name('admin.kota.create');
    
    Route::post('/admin/kota/store', [KotaController::class, 'store'])
        ->name('admin.kota.store');
    
    Route::get('/admin/kota/edit/{kota}', [KotaController::class, 'edit'])
        ->name('admin.kota.edit');
    
    Route::put('/admin/kota/update/{kota}', [KotaController::class, 'update'])
        ->name('admin.kota.update');
    
    Route::delete('/admin/kota/delete/{kota}', [KotaController::class, 'destroy'])
        ->name('admin.kota.delete');
    //--------------------------route kota--------------------------//

    //--------------------------route fasilitas--------------------------//
    Route::get('/admin/fasilitas', [FasilitasController::class, 'index'])
        ->name('admin.fasilitas.index');
    
    Route::get('/admin/fasilitas/create', [FasilitasController::class, 'create'])
        ->name('admin.fasilitas.create');
    
    Route::get('/admin/fasilitas/edit/{fasilitas}', [FasilitasController::class, 'edit'])
        ->name('admin.fasilitas.edit');
    
    Route::post('/admin/fasilitas/store', [FasilitasController::class, 'store'])
        ->name('admin.fasilitas.store');
    
    Route::put('/admin/fasilitas/update/{fasilitas}', [FasilitasController::class, 'update'])
        ->name('admin.fasilitas.update');

    Route::delete('/admin/fasilitas/delete/{fasilitas}', [FasilitasController::class, 'destroy'])
        ->name('admin.fasilitas.delete');
    
    
    //--------------------------route fasilitas--------------------------//

    Route::get('/admin/kost', [KostController::class, 'index'])
        ->name('admin.kost.index');

    Route::get('/admin/kost/create', [KostController::class, 'create'])
        ->name('admin.kost.create');

    Route::post('/admin/kost/store', [KostController::class, 'store'])
        ->name('admin.kost.store');
});

