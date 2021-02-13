<?php

use Illuminate\Support\Facades\Route;

// Import Controllers
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PagesController::class, 'index'])->name('index');

// All products routes
Route::group([
	'prefix' => '/products',
	'as' => 'products.'
], function () {
	Route::get('/', [ProductsController::class, 'index'])->name('index');
	Route::get('/{slug}', [ProductsController::class, 'show'])->name('show');
});

// All cart routes
Route::group([
	'prefix' => '/cart',
	'as' => 'cart.'
], function () {
	Route::get('/', [CartController::class, 'index'])->name('index');
});

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');