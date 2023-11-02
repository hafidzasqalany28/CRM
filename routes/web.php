<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\BuyerMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Middleware\SellerMiddleware;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SellerPromoController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin routes
Route::group(['middleware' => ['auth', 'admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    // Tambahkan rute lain untuk admin
});

// Seller routes
Route::group(['middleware' => ['auth', 'seller'], 'prefix' => 'seller', 'as' => 'seller.'], function () {
    Route::get('/dashboard', [SellerController::class, 'index'])->name('dashboard');
    Route::resource('/input-product', SellerProductController::class)->except('show');
    Route::resource('/input-promo', SellerPromoController::class)->except('show');;
});

// Buyer routes
Route::group(['middleware' => ['auth', 'buyer'], 'prefix' => 'buyer', 'as' => 'buyer.'], function () {
    Route::get('/dashboard', [BuyerController::class, 'index'])->name('dashboard');
    Route::get('/product/detail/{id}', [BuyerController::class, 'productDetail'])->name('product.detail');
    Route::get('/profile', [BuyerController::class, 'profile'])->name('profile');
    Route::get('/order-history', [BuyerController::class, 'orderHistory'])->name('order-history');
});
