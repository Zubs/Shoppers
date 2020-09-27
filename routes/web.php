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
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.add');
Route::get('/cart/remove/{product}', [CartController::class, 'destroy'])->name('cart.remove');
Route::get('/cart/empty', [CartController::class, 'empty'])->name('cart.empty');

/*
	Wish List routes
*/
Route::get('/wishlist', [WishListController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist', [WishListController::class, 'store'])->name('wishlist.add');
Route::get('/wishlist/remove/{product}', [WishListController::class, 'destroy'])->name('wishlist.remove');
Route::get('/wishlist/empty', [WishListController::class, 'empty'])->name('wishlist.empty');

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
