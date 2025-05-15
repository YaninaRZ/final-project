<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::get('/shop-all', function () {
    return Inertia::render('shopAll');
})->name('shop-all');

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

Route::get('/cart-step1', function () {
    return Inertia::render('cartstep1');
})->name('cart-step1');



///////////////////////////////////////////////////////////////////////////////////Products pages


// a corriger
Route::get('/productDetail/{id}', function ($id) {
    return Inertia::render('productDetail', ['id' => $id]);
})->name('product-detail');
// a corriger
Route::get('/postDetail/{id}', function ($id) {
    return Inertia::render('postDetail', ['id' => $id]);
})->name('postDetail');


///////////////////////////////////////////cremes nav bar
Route::get('/creme', function () {
    return Inertia::render('face/creme');
})->name('face.creme');


Route::get('/face/creme-details/{id}', function ($id) {
    return Inertia::render('face/cremeDetails', ['id' => $id]);
})->name('creme-details');

/////////////////////////////////////////////:::mask nav bar 
Route::get('/mask', function () {
    return Inertia::render('face/mask');
})->name('face.mask');


Route::get('/face/mask-details/{id}', function ($id) {
    return Inertia::render('face/maskDetails', ['id' => $id]);
})->name('mask-details');

//////////////////////////////////////////////shampoo nav bar 
Route::get('/shampoo', function () {
    return Inertia::render('hair/shampoo');
})->name('hair/shampoo');


Route::get('/hair/shampoo-details/{id}', function ($id) {
    return Inertia::render('hair/shampooDetails', ['id' => $id]);
})->name('shampoo-details');

///////////////////////////////////////////////incoming nav bar 

Route::get('/body', function () {
    return Inertia::render('body/incoming');
})->name('body/incoming');


Route::get('/body/body-details/{id}', function ($id) {
    return Inertia::render('body/bodyDetails', ['id' => $id]);
})->name('body-details');


///////////////////////////////////////////arrivals nav bar
Route::get('/arrivals', function () {
    return Inertia::render('arrivals');
})->name('arrivals');

Route::get('/arrivals-details/{id}', function ($id) {
    return Inertia::render('arrivalsDetails', ['id' => $id]);
})->name('arrivals-details');



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
