@extends('layouts.main')

@section('content')
      <!--  Modal -->
      <div class="modal fade" id="productView" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="row align-items-stretch">
                <div class="col-lg-6 p-lg-0"><a class="product-view d-block h-100 bg-cover bg-center" style="background: url(img/product-5.jpg)" href="img/product-5.jpg" data-lightbox="productview" title="Red digital smartwatch"></a><a class="d-none" href="img/product-5-alt-1.jpg" title="Red digital smartwatch" data-lightbox="productview"></a><a class="d-none" href="img/product-5-alt-2.jpg" title="Red digital smartwatch" data-lightbox="productview"></a></div>
                <div class="col-lg-6">
                  <button class="close p-4" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <div class="p-5 my-md-4">
                    <ul class="list-inline mb-2">
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                      <li class="list-inline-item m-0"><i class="fas fa-star small text-warning"></i></li>
                    </ul>
                    <h2 class="h4">Red digital smartwatch</h2>
                    <p class="text-muted">₦250</p>
                    <p class="text-small mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes nascetur ridiculus mus. Vestibulum ultricies aliquam convallis.</p>
                    <div class="row align-items-stretch mb-4">
                      <div class="col-sm-7 pr-sm-0">
                        <div class="border d-flex align-items-center justify-content-between py-1 px-3"><span class="small text-uppercase text-gray mr-4 no-select">Quantity</span>
                          <div class="quantity">
                            <button class="dec-btn p-0"><i class="fas fa-caret-left"></i></button>
                            <input class="form-control border-0 shadow-0 p-0" type="text" value="1">
                            <button class="inc-btn p-0"><i class="fas fa-caret-right"></i></button>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-5 pl-sm-0"><a class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0" href="cart.html">Add to cart</a></div>
                    </div><a class="btn btn-link text-dark p-0" href="#"><i class="far fa-heart mr-2"></i>Add to wish list</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!-- HERO SECTION-->
        <section class="py-5 bg-light">
          <div class="container">
            <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
              <div class="col-lg-6">
                <h1 class="h2 text-uppercase mb-0">Checkout</h1>
              </div>
              <div class="col-lg-6 text-lg-right">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </section>
        <section class="py-5">
          <!-- BILLING ADDRESS-->
          @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
          {{-- @if(session()->has('error'))
            <div class="alert alert-danger">{{ session()->get('error') }}</div>
          @endif --}}
          <h2 class="h5 text-uppercase mb-4">Billing details</h2>
          <div class="row">
            <div class="col-lg-8">
              <form action="{{ route('checkout.done') }}" method="POST" id="billing-form" onsubmit="return submitForm();">
                @csrf
                <div class="row">
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="firstName">First name</label>
                    <input class="form-control form-control-lg" id="firstName" type="text" placeholder="Enter your first name" required name="firstname" value="{{ old('firstname') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="lastName">Last name</label>
                    <input class="form-control form-control-lg" id="lastName" type="text" placeholder="Enter your last name" required name="lastname" value="{{ old('lastname') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="email">Email address</label>
                    <input class="form-control form-control-lg" id="email" type="email" placeholder="e.g. Jason@example.com" required name="email" value="{{ old('email') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="phone">Phone number</label>
                    <input class="form-control form-control-lg" id="phone" type="tel" placeholder="e.g. +234 1234567890" required name="phone" value="{{ old('phone') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="company">Company name (optional)</label>
                    <input class="form-control form-control-lg" id="company" type="text" placeholder="Your company name" name="company" value="{{ old('company') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="country">Country</label>
                    <select class="selectpicker country" id="country" data-width="fit" data-style="form-control form-control-lg" data-title="Select your country" name="country" required value="{{ old('country') }}"></select>
                  </div>
                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Address line 1</label>
                    <input class="form-control form-control-lg" id="address" type="text" placeholder="House number and street name" name="address1" required value="{{ old('address1') }}">
                  </div>
                  <div class="col-lg-12 form-group">
                    <label class="text-small text-uppercase" for="address">Address line 2</label>
                    <input class="form-control form-control-lg" id="addressalt" type="text" placeholder="Apartment, Suite, Unit, etc (optional)" name="address2" required value="{{ old('address2') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="city">Town/City</label>
                    <input class="form-control form-control-lg" id="city" type="text" name="town" value="{{ old('town') }}">
                  </div>
                  <div class="col-lg-6 form-group">
                    <label class="text-small text-uppercase" for="state">State/County</label>
                    <input class="form-control form-control-lg" id="state" type="text" name="state" value="{{ old('state') }}">
                  </div>
                  @auth
                    <div class="col-lg-6 form-group">
                      <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="alternateAddressCheckbox" type="checkbox">
                        <label class="custom-control-label text-small" for="alternateAddressCheckbox">Alternate billing address</label>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="row d-none" id="alternateAddress">
                        <div class="col-12 mt-4">
                          <h2 class="h4 text-uppercase mb-4">Alternative billing details</h2>
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="firstName2">First name</label>
                          <input class="form-control form-control-lg" id="firstName2" type="text" placeholder="Enter your first name">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="lastName2">Last name</label>
                          <input class="form-control form-control-lg" id="lastName2" type="text" placeholder="Enter your last name">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="email2">Email address</label>
                          <input class="form-control form-control-lg" id="email2" type="email" placeholder="e.g. Jason@example.com">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="phone2">Phone number</label>
                          <input class="form-control form-control-lg" id="phone2" type="tel" placeholder="e.g. +02 245354745">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="company2">Company name (optional)</label>
                          <input class="form-control form-control-lg" id="company2" type="text" placeholder="Your company name">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="country2">Country</label>
                          <select class="selectpicker country" id="country2" data-width="fit" data-style="form-control form-control-lg" data-title="Select your country"></select>
                        </div>
                        <div class="col-lg-12 form-group">
                          <label class="text-small text-uppercase" for="address2">Address line 1</label>
                          <input class="form-control form-control-lg" id="address2" type="text" placeholder="House number and street name">
                        </div>
                        <div class="col-lg-12 form-group">
                          <label class="text-small text-uppercase" for="address2">Address line 2</label>
                          <input class="form-control form-control-lg" id="addressalt2" type="text" placeholder="Apartment, Suite, Unit, etc (optional)">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="city3">Town/City</label>
                          <input class="form-control form-control-lg" id="city3" type="text">
                        </div>
                        <div class="col-lg-6 form-group">
                          <label class="text-small text-uppercase" for="state4">State/County</label>
                          <input class="form-control form-control-lg" id="state4" type="text">
                        </div>
                      </div>
                    </div>
                  @endauth
                  <div class="col-lg-12 form-group">
                    <button class="btn btn-dark" type="submit">Place order</button>
                  </div>
                </div>
                <input type="hidden" name="message" value="" id="message">
                <input type="hidden" name="reference" value="" id="reference">
                <input type="hidden" name="status" value="" id="status">
                <input type="hidden" name="trans" value="" id="trans">
                <input type="hidden" name="trxref" value="" id="trxref">
                <div class="col-lg-12 form-group">
                    <form action="/test" method="POST">
                      <script src="https://js.paystack.co/v1/inline.js"></script>
                      <button onclick="payWithPaystack()" class="btn btn-dark" id="submit-billing" hidden>Place order</button>
                    </form>
                     
                    <script>
                      function submitForm() {
                        // This lets me know if payment has been made. Yunno because the value is set from the payment response
                        if (document.getElementById('trxref').value) {
                          return true;
                        }

                        // This triggers the payment portal
                        document.getElementById('submit-billing').click();

                        // Makes sure the form only submits when I want
                        return false;
                      };

                      function payWithPaystack() { 
                        var handler = PaystackPop.setup({
                          key: 'pk_test_0e037ea69a1555fcf2f2001b54306b956ef7e07a',
                          email: document.getElementById('email').value,
                          amount: {{ Cart::getTotal() * 100 }},
                          currency: "NGN",
                          metadata: {
                             custom_fields: [
                                {
                                    display_name: "Mobile Number",
                                    variable_name: "mobile_number",
                                    value: document.getElementById('phone').value
                                },
                                {
                                    display_name: "Products",
                                    variable_name: "products",
                                    value: [
                                        @foreach(Cart::getContent() as $product)
                                            {
                                                name: "{{ $product->name }}",
                                                price: "{{ $product->price }}",
                                                quantity: "{{ $product->quantity }}"
                                            },
                                        @endforeach
                                    ]
                                }
                             ]
                          },
                          callback: function(response){
                              alert('success. transaction ref is ' + response.reference);
                              console.log(response);
                              document.getElementById('message').value = response.message;
                              document.getElementById('reference').value = response.reference;
                              document.getElementById('status').value = response.status;
                              document.getElementById('trans').value = response.trans;
                              document.getElementById('trxref').value = response.trxref;
                              document.getElementById('billing-form').submit();
                          }
                        });
                        handler.openIframe();
                      }
                    </script>
                  </div>
              </form>
            </div>
            <!-- ORDER SUMMARY-->
            <div class="col-lg-4">
              <div class="card border-0 rounded-0 p-lg-4 bg-light">
                <div class="card-body">
                  <h5 class="text-uppercase mb-4">Your order</h5>
                  <ul class="list-unstyled mb-0">
                    @foreach(Cart::getContent() as $product)
                      <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">{{ $product->name }}</strong><span class="text-muted small">₦{{ $product->price }}</span></li>
                      <li class="border-bottom my-2"></li>
                    @endforeach
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">VAT (7.5%)</strong><span>₦{{ Cart::getCondition('VAT 7.5%')->getCalculatedValue(Cart::getSubTotal()) }}</span></li>
                    <li class="border-bottom my-2"></li>
                    <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total</strong><span>₦{{ Cart::getTotal() }}</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
@endsection