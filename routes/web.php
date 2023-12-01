<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BuyerMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Middleware\SellerMiddleware;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminPromoController;
use App\Http\Controllers\SellerPromoController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\SellerProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public routes
Route::get('/', function () {
    return view('adminlte::auth.login');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Buyer routes
Route::middleware(['auth', 'buyer'])->group(function () {
    Route::prefix('buyer')->name('buyer.')->group(function () {
        Route::get('/home', [BuyerController::class, 'index'])->name('dashboard');
        Route::get('/about', [BuyerController::class, 'about'])->name('about');
        Route::get('/product/detail/{id}', [BuyerController::class, 'productDetail'])->name('product.detail');
        Route::post('/order/{product_id}', [BuyerController::class, 'order'])->name('order');
        Route::get('/profile', [BuyerController::class, 'profile'])->name('profile');
        Route::get('/order-history', [BuyerController::class, 'orderHistory'])->name('order-history');
    });
});

// Seller routes
Route::middleware(['auth', 'seller'])->group(function () {
    Route::prefix('seller')->name('seller.')->group(function () {
        Route::get('/dashboard', [SellerController::class, 'index'])->name('dashboard');
        Route::resource('/input-product', SellerProductController::class)->except('show');
        Route::resource('/input-promo', SellerPromoController::class)->except('show');
    });
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
        Route::resource('products', AdminProductController::class);
        Route::resource('users', AdminUserController::class);
        Route::resource('promos', AdminPromoController::class);
    });
});
