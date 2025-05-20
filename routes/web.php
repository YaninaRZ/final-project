<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/new-products', function () {
    return Inertia::render('newProducts');
})->name('newProducts');

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

// Cart

Route::get('/cart', function () {
    return Inertia::render('cart');
})->name('cart');


///////////////////////////////////////////////////////////////////////////////////Products pages

// BEST ROUTES EVER

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
Route::get('/postDetail/{id}', function ($id) {
    return Inertia::render('postDetail', ['id' => $id]);
})->name('postDetail');



//************************************************************************ *ROUTES ADMIN*/

// Admin log

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

Route::get('/ordered-products', function () {
    return Inertia::render('admin/orderedProducts');
})->name('orderedproducts');

Route::get('/order-list', function () {
    return Inertia::render('admin/orderList');
})->name('orderList');

Route::get('/client', function () {
    return Inertia::render('admin/client');
})->name('client');

Route::get('/categories', function () {
    return Inertia::render('admin/categories');
})->name('categories');

// a corriger
Route::get('productsAdmin/{id}', function ($id) {
    return Inertia::render('admin/productsAdmin', ['id' => $id]);
})->name('productsAdmin');

Route::get('admin/add-product', function () {
    return Inertia::render('admin/add-product');
})->name('add-product');

Route::get('admin/ordered-product-details/{id}', function ($id) {
    return Inertia::render('admin/ordered-product-details', ['id' => $id]);
})->name('ordered-product-details');



///////////////////////////////////////////////////::://////////////////////////   client log 

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

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
