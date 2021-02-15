<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Models
use App\Models\Products;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart')->with('title', "Cart");
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
        $id = $request->id;
        $quantity = $request->quantity;
        $product = Products::where('id', $id)->first();

        \Cart::add($product->id, $product->name, $product->price, $quantity)->associate('App\Models\Products');

        $condition = new \Darryldecode\Cart\CartCondition(array(
            'name' => 'VAT 7.5%',
            'type' => 'tax',
            'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => '7.5%',
            'attributes' => array( // attributes field is optional
                'description' => 'Value Added Tax',
            )
        ));

        // $condition2 = new \Darryldecode\Cart\CartCondition(array(
        //     'name' => 'Delivery Fee',
        //     'type' => 'shipping',
        //     'target' => 'total', // this condition will be applied to cart's subtotal when getSubTotal() is called.
        //     'value' => '+' . 1000 * floor(\Cart::getContent()->count() > 10 ? \Cart::getContent()->count() / 10 + 1 : 1),
        //     'order' => 1
        // ));

        \Cart::condition($condition);
        // \Cart::condition($condition2);

        return redirect()->route('cart.index')->with('success', 'Product Added To Cart Successfully');
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
    public function delete($id)
    {
        \Cart::remove($id);

        return redirect()->route('cart.index')->with('success', 'Product Removed Successfully');
    }
}
