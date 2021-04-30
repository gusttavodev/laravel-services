<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Establishment\EstablishmentController;

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
    Route::get('', [CategoryController::class, 'index'])->name('categoryIndex');

    Route::get('create', [CategoryController::class, 'create'])->name('categoryCreate');
    Route::post('create', [CategoryController::class, 'store'])->name('categoryStore');

    Route::get('{category}', [CategoryController::class, 'edit'])->name('categoryEdit');
    Route::post('{category}', [CategoryController::class, 'update'])->name('categoryUpdate');

    Route::delete('{category}', [CategoryController::class, 'destroy'])->name('categoryDelete');
});

Route::prefix('product')->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('productIndex');

    Route::get('create', [ProductController::class, 'create'])->name('productCreate');
    Route::post('create', [ProductController::class, 'store'])->name('productStore');

    Route::get('{product}', [ProductController::class, 'edit'])->name('productEdit');
    Route::post('{product}', [ProductController::class, 'update'])->name('productUpdate');

    Route::delete('{product}', [ProductController::class, 'destroy'])->name('productDelete');
});

Route::prefix('establishment')->group(function () {
    Route::get('', [EstablishmentController::class, 'index'])->name('establishmentIndex');

    Route::get('create', [EstablishmentController::class, 'create'])->name('establishmentCreate');
    Route::post('create', [EstablishmentController::class, 'store'])->name('establishmentStore');

    Route::get('{establishment}', [EstablishmentController::class, 'edit'])->name('establishmentEdit');
    Route::post('{establishment}', [EstablishmentController::class, 'update'])->name('establishmentUpdate');

    Route::delete('{establishment}', [EstablishmentController::class, 'destroy'])->name('establishmentDelete');
});
