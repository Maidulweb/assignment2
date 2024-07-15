<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('/dashboard/{id}', [DashboardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/show/{id}', [DashboardController::class, 'show'])->name('dashboard.info-show');
    
    Route::get('/admin/info-show', [AdminController::class, 'index'])->name('admin.info-show');
    Route::delete('/admin/info-show/{id}', [AdminController::class, 'destory'])->name('admin.info-show.destory');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
