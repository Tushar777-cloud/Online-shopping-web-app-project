<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\AdminController;

// Frontend Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', function () {
        return view('checkout.index');
    })->name('checkout.index');
    Route::post('/checkout', [OrderController::class, 'store'])->name('checkout.store');

    Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::post('/wishlist/toggle/{product}', [WishlistController::class, 'toggle'])->name('wishlist.toggle');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
});

// Payment Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/payment/esewa/{order}', [PaymentController::class, 'esewaRequest'])->name('payment.esewa.request');
    Route::get('/payment/esewa/success/{order}', [PaymentController::class, 'esewaSuccess'])->name('payment.esewa.success');
    Route::get('/payment/esewa/failure/{order}', [PaymentController::class, 'esewaFailure'])->name('payment.esewa.failure');
});

// Review Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/products/{product}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/orders', [AdminController::class, 'orders'])->name('admin.orders.index');
    Route::get('/orders/{order}', [AdminController::class, 'showOrder'])->name('admin.orders.show');
    Route::patch('/orders/{order}/status', [AdminController::class, 'updateOrderStatus'])->name('admin.orders.update-status');
    Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers.index');
});