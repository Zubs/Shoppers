@extends('layouts.main')

@section('content')
	<div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset('template/images/'.$products->slug.'.jpg') }}" alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $products->name }}</h2>
            <p class="mb-4">{{ $products->description }}</p>
            <p><strong class="text-primary h4">{{ $products->presentPrice() }}</strong></p>
            <form action="{{ route('cart.add') }}" method="POST">
              @csrf
              <div class="mb-1 d-flex">
                <label for="option-sm" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="size"></span> <span class="d-inline-block text-black">Small</span>
                </label>
                <label for="option-md" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="size"></span> <span class="d-inline-block text-black">Medium</span>
                </label>
                <label for="option-lg" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="size"></span> <span class="d-inline-block text-black">Large</span>
                </label>
                <label for="option-xl" class="d-flex mr-3 mb-3">
                  <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="size"></span> <span class="d-inline-block text-black"> Extra Large</span>
                </label>
              </div>
              <div class="mb-5">
                <div class="input-group mb-3" style="max-width: 120px;">
                  <div class="input-group-prepend">
                    <button class="btn btn-outline-primary js-btn-minus" type="button" onclick="logValue();">&minus;</button>
                  </div>
                  <input type="text" class="form-control text-center" id="zubair" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1" name="qty">
                  <script>
                    function logValue() {
                      console.log(parseInt(document.getElementById('zubair').value) + 1);
                    };
                  </script>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary js-btn-plus" type="button" onclick="logValue();">&plus;</button>
                  </div>
                </div>
              </div>
              {{-- <p><a href="{{ route('cart.index') }}" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p> --}}
              <input type="hidden" name="id" value="{{ $products->id }}">
              <input type="hidden" name="name" value="{{ $products->name }}">
              <input type="hidden" name="price" value="{{ $products->presentPrice() }}">
              <p><button class="buy-now btn btn-sm btn-primary" type="submit">Add To Cart</button></p>
            </form>

          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              @foreach($others as $other)
                <div class="item">
                  <div class="block-4 text-center">
                    <figure class="block-4-image">
                      <img src="{{ asset('template/images/'.$other->slug.'.jpg') }}" alt="Image placeholder" class="img-fluid">
                    </figure>
                    <div class="block-4-text p-4">
                      <h3><a href="{{ route('products.show', [$other->slug]) }}">{{ $other->name }}</a></h3>
                      <p class="mb-0">{{ $other->details }}</p>
                      <p class="text-primary font-weight-bold">{{ $other->presentPrice() }}</p>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection