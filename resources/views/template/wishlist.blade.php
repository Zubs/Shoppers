@extends('layouts.main')

@section('content')
	<div class="site-section">
      <div class="container">
        @if(session()->has('success'))
          <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <div class="row mb-5">
          <form class="col-md-12" method="post">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class="product-thumbnail">Image</th>
                    <th class="product-name">Product</th>
                    <th class="product-price">Price</th>
                    {{-- <th class="product-quantity">Quantity</th> --}}
                    <th class="product-remove">Move To Cart</th>
                    <th class="product-remove">Remove</th>
                  </tr>
                </thead>
                <tbody>
                  @if(Cart::instance('wishlist')->count() > 0)
                    @foreach(Cart::instance('wishlist')->content() as $product) 
                      <tr>
                        <td class="product-thumbnail">
                          <a href="{{ route('products.show', [$product->model->slug]) }}"><img src="{{ asset('template/images/'.$product->model->slug.'.jpg') }}" alt="Image" class="img-fluid"></a>
                        </td>
                        <td class="product-name">
                          <h2 class="h5 text-black"><a href="{{ route('products.show', [$product->model->slug]) }}">{{ $product->model->name }}</a></h2>
                        </td>
                        <td>₦{{ $product->price }}</td>
                        <td><a href="{{ route('wishlist.move', $product->rowId) }}" class="btn btn-primary btn-sm">Move</a></td>
                        <td><a href="{{ route('wishlist.remove', $product->rowId) }}" class="btn btn-primary btn-sm">X</a></td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="6"><h2>No Items In Wish List</h2></td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>
          </form>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="row mb-5">
              {{-- <div class="col-md-4 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block">Update Cart</button>
              </div> --}}
              <div class="col-md-6 mb-3 mb-md-0">
                <button class="btn btn-primary btn-sm btn-block" onclick="window.location='{{ route('wishlist.empty') }}'" {{ Cart::instance('wishlist')->count() ? "" : "disabled" }}>Empty Wish List</button>
              </div>
              <div class="col-md-6">
                <button class="btn btn-outline-primary btn-sm btn-block" onclick="window.location='{{ route('products.index') }}'">Continue Shopping</button>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <label class="text-black h4" for="coupon">Coupon</label>
                <p>Enter your coupon code if you have one.</p>
              </div>
              <div class="col-md-8 mb-3 mb-md-0">
                <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
              </div>
              <div class="col-md-4">
                <button class="btn btn-primary btn-sm">Apply Coupon</button>
              </div>
            </div>
          </div>
          <div class="col-md-6 pl-5">
            <div class="row justify-content-end">
              <div class="col-md-7">
                <div class="row">
                  <div class="col-md-12 text-right border-bottom mb-5">
                    <h3 class="text-black h4 text-uppercase">Wish List Totals</h3>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Subtotal</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">₦{{ Cart::instance('wishlist')->subtotal() }}</strong>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Tax</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">₦{{ Cart::instance('wishlist')->tax() }}</strong>
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col-md-6">
                    <span class="text-black">Total</span>
                  </div>
                  <div class="col-md-6 text-right">
                    <strong class="text-black">₦{{ Cart::instance('wishlist')->total() }}</strong>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='/checkout'">Proceed To Checkout</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection