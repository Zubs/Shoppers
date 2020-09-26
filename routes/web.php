<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;

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
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.remove');
Route::get('/cart/empty', [CartController::class, 'empty'])->name('cart.empty');

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
