<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Product\CategoryController;
use App\Http\Controllers\Product\AdditionalController;
use App\Http\Controllers\Establishment\ThemeController;
use App\Http\Controllers\Establishment\AddressController;
use App\Http\Controllers\Establishment\OpeningHourController;
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

Route::prefix('profile')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('profileIndex');

    Route::put('/information', [ProfileController::class, 'updateProfile'])->name('profileUpdateInformation');
    Route::put('/address', [ProfileController::class, 'updateAddress'])->name('profileUpdateAddress');
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

Route::prefix('additional')->group(function () {
    Route::get('', [AdditionalController::class, 'index'])->name('additionalIndex');

    Route::get('create', [AdditionalController::class, 'create'])->name('additionalCreate');
    Route::post('create', [AdditionalController::class, 'store'])->name('additionalStore');

    Route::get('{additional}', [AdditionalController::class, 'edit'])->name('additionalEdit');
    Route::post('{additional}', [AdditionalController::class, 'update'])->name('additionalUpdate');

    Route::delete('{additional}', [AdditionalController::class, 'destroy'])->name('additionalDelete');
});

Route::prefix('theme')->group(function () {
    Route::get('', [ThemeController::class, 'index'])->name('themeIndex');

    Route::get('create', [ThemeController::class, 'create'])->name('themeCreate');
    Route::post('create', [ThemeController::class, 'store'])->name('themeStore');

    Route::get('{theme}', [ThemeController::class, 'edit'])->name('themeEdit');
    Route::post('{theme}', [ThemeController::class, 'update'])->name('themeUpdate');

    Route::delete('{theme}', [ThemeController::class, 'destroy'])->name('themeDelete');
});



Route::prefix('establishment')->group(function () {
    Route::get('', [EstablishmentController::class, 'index'])->name('establishmentIndex');

    Route::get('create', [EstablishmentController::class, 'create'])->name('establishmentCreate');
    Route::post('create', [EstablishmentController::class, 'store'])->name('establishmentStore');

    Route::get('{establishment}', [EstablishmentController::class, 'edit'])->name('establishmentEdit');
    Route::post('{establishment}', [EstablishmentController::class, 'update'])->name('establishmentUpdate');

    Route::delete('{establishment}', [EstablishmentController::class, 'destroy'])->name('establishmentDelete');

    Route::prefix('customize')->group(function () {
        Route::get('{establishment}', [EstablishmentController::class, 'customize'])->name('establishmentCustomize');

        Route::post('opening_hour_store', [OpeningHourController::class, 'store'])->name('establishmentOpeningHourStore');
        Route::post('address_store', [AddressController::class, 'store'])->name('establishmentAddressStore');
    });
});

Route::middleware('inertia_request_establishment')->prefix('menu')->group(function () {
    Route::get('/establishment/{public_link_name}', [EstablishmentController::class, 'showEstablishmentPublic'])->name('establishmentShowPublic');
    Route::get('/establishment/{public_link_name}/order', [OrderController::class, 'establishmentOrderCreate'])->name('establishmentOrderCreate');
});
Route::prefix('menu')->group(function () {
    Route::get('/order/{tracking_link}', [OrderController::class, 'establishmentOrderShow'])->name('establishmentOrderShow');
});

Route::prefix('order')->group(function () {
    Route::get('', [OrderController::class, 'index'])->name('orderIndex');

    Route::get('create', [OrderController::class, 'create'])->name('orderCreate');
    Route::post('create', [OrderController::class, 'store'])->name('orderStore');

    Route::get('{order}', [OrderController::class, 'edit'])->name('orderEdit');
    Route::post('{order}', [OrderController::class, 'update'])->name('orderUpdate');

    Route::delete('{order}', [OrderController::class, 'destroy'])->name('orderDelete');

    // Route::post('step/contact-information', [OrderController::class, 'stepContactInformation'])->name('orderStepContactInformation');
});
