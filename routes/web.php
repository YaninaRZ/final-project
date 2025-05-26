<?php

use App\Http\Controllers\AllProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\AllProduct;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
///////////////////////////////////////////////////////////////////////NON CONNECTÉ

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/new-products', function () {
    return Inertia::render('new-products');
})->name('new-products');

Route::get('/about', function () {
    return Inertia::render('about');
})->name('about');

Route::get('/contact', function () {
    return Inertia::render('contact');
})->name('contact');

Route::get('/terms-of-services', function () {
    return Inertia::render('terms-of-services');
})->name('terms-of-services');

Route::get('/privacy-policy', function () {
    return Inertia::render('privacy-policy');
})->name('privacy-policy');

Route::get('/licence', function () {
    return Inertia::render('licence');
})->name('licence');

Route::get('/cart', function () {
    return Inertia::render('cart');
})->name('cart');


///////////////////////////////////////////////////////////////////////PAGES PRODUITS

Route::get('/products', function () {
    return Inertia::render('products/index');
})->name('products');

Route::get('/products/category/{category}', function ($category) {
    return Inertia::render('products/index', ['category' => $category]);
})->name('products.category');

Route::get('/products/{id}', function ($id) {
    return Inertia::render('products/show', ['id' => $id]);
})->name('products.show');

// a corriger
Route::get('/post-detail/{id}', function ($id) {
    return Inertia::render('post-detail', ['id' => $id]);
})->name('post-detail');


///////////////////////////////////////////////////////////////////////ROUTES ADMIN

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('dashboard', function () {
            return Inertia::render('admin/dashboard');
        })->name('dashboard');

        Route::get('all-products', [AllProductController::class, 'index'])->name('all-products');
        Route::post('all-products', [AllProductController::class, 'store'])->name('all-products.store');
        Route::put('all-products/{allProduct}', [AllProductController::class, 'update'])->name('all-products.update');
        Route::get('all-products/{allProduct}', [AllProductController::class, 'show'])->name('product-detail');
        Route::delete('all-products/{allProduct}', [AllProductController::class, 'destroy'])->name('all-products.destroy');

        Route::get('order-list', [OrdersController::class, 'index'])->name('order-list');
        Route::get('orders/{order}', [OrdersController::class, 'show'])->name('orders.show');
        Route::delete('orders/{orders}', [OrdersController::class, 'destroy'])->name('orders.destroy');

        Route::get('client', [UserController::class, 'index'])->name('client');
        Route::post('client-create', [UserController::class, 'store'])->name('client.store');
        Route::delete('client-delete/{id}', [UserController::class, 'destroy'])->name('client.destroy');


        Route::get('categories', [CategoryController::class, 'index'])->name('categories');
        Route::post('categories-create', [CategoryController::class, 'store'])->name('categories.store');
        Route::put('categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('categories-delete/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        Route::get('product-detail/{id}', function ($id) {
            return Inertia::render('admin/product-detail', ['id' => $id]);
        })->name('productsAdmin');

        Route::get('add-product', function () {
            return Inertia::render('admin/add-product');
        })->name('add-product');

        Route::get('order-summary/{id}', function ($id) {
            return Inertia::render('admin/order-summary', ['id' => $id]);
        })->name('order-summary');
    });
});


///////////////////////////////////////////////////////////////////////PROFIL CLIENT
Route::middleware(['auth', 'verified', 'role:client'])->group(function () {

    Route::get('/user-account', function () {
        return Inertia::render('client/user-account');
    })->name('user-account');


    Route::get('/user-password', function () {
        return Inertia::render('client/user-password');
    })->name('user-password');

    Route::get('/user-billing', function () {
        return Inertia::render('client/user-billing');
    })->name('user-billing');

    Route::get('/client/view-order/{id}', function ($id) {
        return Inertia::render('client/view-order', ['id' => $id]);
    })->name('view-order');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
