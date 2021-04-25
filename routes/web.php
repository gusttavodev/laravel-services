<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\CategoryController;

require __DIR__.'/auth.php';

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboardIndex');
});

Route::prefix('user')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('userIndex');
    Route::get('/create', [UserController::class, 'create'])->name('userCreate');
    Route::post('/create', [UserController::class, 'store'])->name('userStore');

    Route::get('/{user}', [UserController::class, 'edit'])->name('userEdit');
    Route::put('/{user}', [UserController::class, 'update'])->name('userUpdate');
});

Route::prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categoryIndex');

    Route::get('/create', [CategoryController::class, 'create'])->name('categoryCreate');
    Route::post('/create', [CategoryController::class, 'store'])->name('categoryStore');
});
