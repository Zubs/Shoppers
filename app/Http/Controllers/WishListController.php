<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Wish List';
        return view('template.wishlist')->with('title', $title);
    }

    /**
     * Deletes all the resources in the current cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function empty()
    {
        Cart::instance('wishlist')->destroy();

        return redirect()->route('wishlist.index')->with('success', 'Wish List Emptied Successfully');
    }

    /**
     * Moves the specified resource from the current cart instance.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function moveToCart($id)
    {
        $item = Cart::instance('wishlist')->get($id);
        Cart::instance('wishlist')->remove($id);
        Cart::instance('default')->add($item->id, $item->name, 1, $item->price, 0)->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success', 'Product Moved From Wish List To Cart Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Cart::instance('wishlist')->add($request->id, $request->name, 1, $request->price, 0)->associate('App\Models\Product');

        return redirect()->route('wishlist.index')->with('success', 'Product Added To Wish List Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::instance('wishlist')->remove($id);

        return back()->with('success', 'Product Removed From Wish List Successfully');
    }
}
