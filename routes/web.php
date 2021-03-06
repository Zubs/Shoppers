<?php

use Illuminate\Support\Facades\Route;

// Import Controllers
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishListController;
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

Route::get('/test', function () {
	var_dump($_POST);
});

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
	Route::post('/', [CartController::class, 'store'])->name('store');
	Route::delete('/{rowId}', [CartController::class, 'delete'])->name('delete');
	Route::get('/empty', function () {
		\Cart::clear();
	});
});

// All Checkout routes
Route::group([
	'prefix' => 'checkout',
	'as' => 'checkout.'
], function () {
	Route::get('/', [CheckoutController::class, 'index'])->name('index');
	Route::post('/order-successful', [CheckoutController::class, 'store'])->name('done');
});