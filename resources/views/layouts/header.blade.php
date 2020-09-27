<!DOCTYPE html>
<html lang="en">
  <head>
    <title>{{ config('app.name', 'Shoppers') }} {{ $title ? "| ".$title : '' }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{ asset('template/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">


    <link rel="stylesheet" href="{{ asset('template/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="text" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="{{ route('pages.index') }}" class="js-logo-clone">Shoppers</a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="#"><span class="icon icon-person"></span></a></li>
                  <li>
                    <a href="#" class="site-cart">
                      <span class="icon icon-heart-o"></span>
                      <span class="count">{{ Cart::instance('wishlist')->count() }}</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('cart.index') }}" class="site-cart">
                      <span class="icon icon-shopping_cart"></span>
                      @if(Cart::instance('default')->count())
                        <span class="count">{{ Cart::instance('default')->count() }}</span>
                      @endif
                    </a>
                  </li> 
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li><a href="{{ route('pages.index') }}">Home</a></li>
            <li><a href="{{ route('about') }}">About</a></li>
            <li><a href="{{ route('products.index') }}">Shop</a></li>
            {{-- <li class="has-children">
              <a href="#">Catalogue</a>
              <ul class="dropdown">
                <li><a href="#">Menu One</a></li>
                <li><a href="#">Menu Two</a></li>
                <li><a href="#">Menu Three</a></li>
              </ul>
            </li> 
            <li><a href="#">New Arrivals</a></li> --}}
            <li><a href="{{ route('contact') }}">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>

    @if($title)
      <div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('pages.index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $title }}</strong></div>
          </div>
        </div>
      </div>
    @endif