<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
Use App\Http\Controllers\WishListController;

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

/*
    Static pages kinda -_-
*/
Route::get('/', [PagesController::class, 'index'])->name('pages.index');
Route::get('/about', [PagesController::class, 'about'])->name('about');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::get('/thanks', [PagesController::class, 'thanks'])->name('thanks');

/*
    Cart routes
*/
Route::group([
	'prefix' => '/cart',
	'as' => 'cart.',
], function () {
	Route::get('/', [CartController::class, 'index'])->name('index');
	Route::post('/', [CartController::class, 'store'])->name('add');
	Route::get('/remove/{product}', [CartController::class, 'destroy'])->name('remove');
	Route::get('/move/{product}', [CartController::class, 'saveForLater'])->name('move');
	Route::get('/empty', [CartController::class, 'empty'])->name('empty');
});

/*
	Wish List routes
*/
Route::group([
	'prefix' => '/wishlist',
	'as' => 'wishlist.',
], function () {
	Route::get('/', [WishListController::class, 'index'])->name('index');
	Route::post('/', [WishListController::class, 'store'])->name('add');
	Route::get('/remove/{product}', [WishListController::class, 'destroy'])->name('remove');
	Route::get('/move/{product}', [WishListController::class, 'moveToCart'])->name('move');
	Route::get('/empty', [WishListController::class, 'empty'])->name('empty');
	Route::get('/all/move', [WishListController::class, 'allToCart'])->name('allToCart');
});

/*
    Checkout route
*/
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

/*
    Product routes
*/
Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('products.show');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
