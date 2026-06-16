<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Frontend Routes
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/products/{slug}', function ($slug) {
    return view('products.show', compact('slug'));
})->name('products.show');

Route::get('/cart', function () {
    return view('cart.index');
})->name('cart.index')->middleware(['auth', 'role:customer']);

Route::get('/checkout', function () {
    return view('checkout.index');
})->name('checkout.index')->middleware(['auth', 'role:customer']);

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
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');

    Route::get('/orders', function () {
        return view('orders.index');
    })->name('orders.index');

    Route::get('/wishlist', function () {
        return view('wishlist.index');
    })->name('wishlist.index');
});

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/products', function () {
        return view('admin.products.index');
    })->name('admin.products.index');

    Route::get('/orders', function () {
        return view('admin.orders.index');
    })->name('admin.orders.index');
});
