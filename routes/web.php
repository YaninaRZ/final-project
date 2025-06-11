<?php

use App\Http\Controllers\AllProductController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPasswordController;
use App\Http\Middleware\RoleMiddleware;
use App\Models\Category;
use App\Models\Product;
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

Route::post('orders-store', [OrdersController::class, 'store'])->name('orders.store');
Route::get('/client-orders', [OrdersController::class, 'clientOrders'])
    ->name('orders.clientOrders');
Route::get('/merci', function () {
    return Inertia::render('client/thank-you');
})->name('thank-you');


///////////////////////////////////////////////////////////////////////PAGES PRODUITS


Route::get('/products/category/{category}', function ($category) { // category = dans l'URL
    $category = Category::where('name', ucwords($category))->firstOrFail(); //ucwords pour Capitalize
    $products = $category->products()->with('category')->get();
    return Inertia::render('products/index', ['products' => $products]);
})->name('products.category');

Route::get('/products', [AllProductController::class, 'clientIndex'])->name('products');




Route::get('/products/{id}', function ($id) {
    $product = Product::with('category')->findOrFail($id);

    return Inertia::render('products/show', [
        'product' => $product,
    ]);
})->name('products.show');


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

    Route::get('/admin/categories/hierarchy', [CategoryController::class, 'getHierarchy'])->name('categories.hierarchy');
    Route::post('/admin/categories/store-parent', [CategoryController::class, 'storeParent'])->name('categories.storeParent');
});


Route::get('/test-categories', function () {
    $categories = Category::with('parent', 'children')->get();
    return $categories;
});


///////////////////////////////////////////////////////////////////////PROFIL CLIENT
Route::middleware(['auth', 'verified', 'role:client'])->group(function () {

    Route::get('/user-account', function () {
        return Inertia::render('client/user-account');
    })->name('user-account');


    Route::get('/user-password', function () {
        return Inertia::render('client/user-password');
    })->name('user-password');


    Route::get('/user-billing', [OrdersController::class, 'clientOrders'])
        ->middleware('auth')
        ->name('user-billing');

    Route::get('/client/view-order/{id}', [OrdersController::class, 'showClientOrder'])
        ->name('view-order');
});

//////////////////////////////////////////////////////////////////////RESET MDP






require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
