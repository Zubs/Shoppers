<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        if (request()->category) {
            $category = Category::where('slug', request()->category)->first();
            // return $category[0]['name'];
            $title = $category->name.'\'s Products';
            $products = $category->products;
        } else {
            $title = 'Products';
            $products = Product::inRandomOrder()->get();
        };
        return view('template.products')->with([
            'title' => $title,
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $products = Product::where('slug', $slug)->get();
        $title = $products[0]->name;
        $others = Product::where('slug', '!=', $slug)->inRandomOrder()->take(5)->get();
        return view('template.product')->with([
            'title' => $title,
            'products' => $products[0],
            'others' => $others,
        ]);
    }
}
