<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = '';
        $products = Product::inRandomOrder()->take(5)->get();
        return view('welcome')->with([
            'title' => $title,
            'products' => $products,
        ]);
    }

    /**
     * Display the page for details of the company.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $title = 'About Us';
        return view('template.about')->with('title', $title);
    }

    /**
     * Display the page for getting messages to the company.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        $title = 'Contact Us';
        return view('template.contact')->with('title', $title);
    }

    /**
     * Display the page for greeting users of the company on buying a product or products.
     *
     * @return \Illuminate\Http\Response
     */
    public function thanks()
    {
        $title = 'Thank You';
        return view('template.thanks')->with('title', $title);
    }
}
