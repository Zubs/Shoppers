<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

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
	1. Make a model
	2. Seed the db
	3. Make a controller for general pages
*/

Route::get('/', function () {
	$title = '';
	$products = Product::inRandomOrder()->take(5)->get();
    return view('welcome')->with([
    	'title' => $title,
    	'products' => $products,
    ]);
});
Route::get('/about', function () {
	$title = 'About Us';
    return view('template.about')->with('title', $title);
});
Route::get('/cart', function () {
	$title = 'Cart';
    return view('template.cart')->with('title', $title);
});
Route::get('/checkout', function () {
	$title = 'Checkout';
    return view('template.checkout')->with('title', $title);
});
Route::get('/contact', function () {
	$title = 'Contact Us';
    return view('template.contact')->with('title', $title);
});
Route::get('/product/{slug}', function ($slug) {
	$products = Product::where('slug', $slug)->get();
	$title = $products[0]->name;
    $others = Product::where('slug', '!=', $slug)->inRandomOrder()->take(5)->get();
    return view('template.product')->with([
    	'title' => $title,
    	'products' => $products[0],
        'others' => $others,
    ]);
});
Route::get('/products', function () {
	$title = 'Products';
	$products = Product::inRandomOrder()->get();
    return view('template.products')->with([
    	'title' => $title,
    	'products' => $products,
    ]);
});
Route::get('/thanks', function () {
	$title = 'Thank You';
    return view('template.thanks')->with('title', $title);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
