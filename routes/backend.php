<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\Home\DashboardController;
use App\Http\Controllers\Backend\Role\PermissionController;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::controller(PermissionController::class)->group(function () {
            Route::get('/permission', 'index')->name('permission.index');
            Route::get('/permission/list', 'permissionList')->name('permission.list');
            Route::post('/permission/store', 'store')->name('permission.store');
            Route::delete('/permission/delete/{id}', 'destroy')->name('permission.delete');
        });

    });
});



