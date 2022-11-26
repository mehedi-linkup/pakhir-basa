@extends('layouts.website')
@section('website-content')
<main class="main checkout">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{ route('cart.list') }}">Shopping Cart</a></li>
                <li class="active"><a href="{{ route('checkout.index') }}">Checkout</a></li>
                <li><a>Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->


    <!-- Start of PageContent -->
    <div class="page-content">
        <div class="container">
            @if(!Auth::guard('customer')->user())
            <div class="login-toggle">
                Returning customer? <a href=""
                    class="show-login font-weight-bold text-uppercase text-dark">Login</a>
            </div>
            @endif
            <form class="login-content" action="{{ route('customer.auth.page') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" class="form-control form-control-md" name="email" id="email" 
                                required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" class="form-control form-control-md" name="password" id="password"
                                required>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-rounded btn-login">Login</button>
            </form>
            {{-- <div class="coupon-toggle">
                Have a coupon? <a href="#"
                    class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                    code</a>
            </div> --}}
            {{-- <div class="coupon-content mb-4">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                </div>
            </div> --}}
            <form class="form checkout-form" action="{{ route('order.store') }}" method="post">
                @csrf
                <div class="row mb-9 justify-content-center">
                    <div class="col-lg-4 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="hidden" name="customer_id" value="{{ @Auth::guard('customer')->user()->id }}">
                                    <input type="text" class="form-control form-control-md" name="name" value="{{ @Auth::guard('customer')->user()->name }}"
                                      placeholder="Enter Name" required>

                                    @error('name')
                                      <span class="text-danger" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input type="text" class="form-control form-control-md" name="phone" value="{{ @Auth::guard('customer')->user()->phone }}" placeholder="Enter Email">
        
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control form-control-md" name="email" value="{{ @Auth::guard('customer')->user()->email }}" placeholder="Enter Email">
        
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Thana</label>
                                    <div class="select-box">
                                        <select name="thana_id" class="form-control form-control-md">
                                            <option value="">Select Thana</option>
                                            @foreach ($thana as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('thana_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                   
                        <div class="form-group">
                            <label>Area</label>
                            <div class="select-box">
                                <select name="area_id" class="form-control form-control-md">
                                    <option value="" selected="selected">Select Area</option>
                                    @foreach ($area as $item)
                                    <option value="{{ $item->id }} {{ @Auth::guard('customer')->user()->area_id == $item->id ? 'selected' : '' }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                @error('area_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="address">Address *</label>
                            <textarea class="form-control mb-0" id="address" name="address" cols="30"
                                rows="4"
                                placeholder="Enter Address">{{ @Auth::guard('customer')->user()->address }}</textarea>
                        </div>
                        {{-- <div class="form-group checkbox-toggle pb-2">
                            <input type="checkbox" class="custom-checkbox" id="shipping-toggle"
                                name="shipping-toggle">
                            <label for="shipping-toggle">Ship to a different address?</label>
                        </div> --}}
                        {{-- <div class="checkbox-content">
                            <div class="row gutter-sm">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label>Name *</label>
                                        <input type="text" class="form-control form-control-md" name="name" value=""
                                            placeholder="Enter Name"  required>
    
                                        @error('name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control form-control-md" name="phone" value="" placeholder="Enter Email">
    
                                @error('phone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input type="email" class="form-control form-control-md" name="email" value="" placeholder="Enter Email">
    
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Thana</label>
                                <div class="select-box">
                                    <select name="thana_id" class="form-control form-control-md">
                                        <option value="">Select Thana</option>
                                        @foreach ($thana as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('thana_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Area</label>
                                <div class="select-box">
                                    <select name="area_id" class="form-control form-control-md">
                                        <option value="" selected="selected">Select Area</option>
                                        @foreach ($area as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group mt-3">
                                <label for="order-notes">Address *</label>
                                <textarea class="form-control mb-0" id="address" name="address" cols="30"
                                    rows="4"
                                    placeholder="Enter Address"></textarea>
                            </div>
                        </div> --}}
                        <div class="form-group mt-3">
                            <label for="order-note">Order notes (optional)</label>
                            <textarea class="form-control mb-0" id="order_note" name="order_note" cols="30"
                                rows="3"
                                placeholder="Notes about your order, e.g special notes for delivery" >{{ @Auth::guard('customer')->user()->order_note }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <b>Product</b>
                                            </th>
                                            <th>
                                                <b>Unit Price</b>
                                            </th>
                                            <th class="text-right">
                                                <b>Product Price</b>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartItems as $item)
                                        <tr class="bb-no">
                                            <td class="product-name"> {{ $item->name }} <i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">{{ $item->quantity }}</span></td>
                                            <td class="product-name">{{ $item->price }}</td>
                                            <td class="product-total">{{ $item->quantity * $item->price }}</td>
                                        </tr>
                                        @endforeach
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td></td>
                                            <td>
                                                <b id="cartTotal">{{ \Cart::getTotal() }}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        {{-- <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                </h4>
                                                <ul id="shipping-method" class="mb-4">
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="inside_dhaka"
                                                                class="custom-control-input" name="shipping" onclick="priceTotal(this.shipcharge)">
                                                            <label for="inside_dhaka"
                                                                class="custom-control-label color-dark">Inside Dhaka (Delivery Charge: 70TK)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="outside_dhaka"
                                                                class="custom-control-input" name="shipping" onclick="priceTotal(this.shipcharge)">
                                                            <label for="outside_dhaka"
                                                                class="custom-control-label color-dark">Outside Dhaka (Delivery Charge: 120TK)</label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr> --}}
                                        <tr class="order-total">
                                            <th>
                                                <b>Total</b>
                                            </th>
                                            <td></td>
                                            <td>
                                                <b id="priceTotal">{{ \Cart::getTotal() }}</b>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                    <div class="accordion payment-accordion">
                                        {{-- <div class="card">
                                            <div class="card-header">
                                                <a href="#cash-on-delivery" class="collapse">Direct Bank Transfor</a>
                                            </div>
                                            <div id="cash-on-delivery" class="card-body expanded">
                                                <p class="mb-0">
                                                    Make your payment directly into our bank account. 
                                                    Please use your Order ID as the payment reference. 
                                                    Your order will not be shipped until the funds have cleared in our account.
                                                </p>
                                            </div>
                                        </div> --}}
                                        {{-- <div class="card">
                                            <div class="card-header">
                                                <a href="#payment" class="expand">Check Payments</a>
                                            </div>
                                            <div id="payment" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                </p>
                                            </div>
                                        </div> --}}
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#delivery" class="expand collapse" >Cash on delivery</a>
                                            </div>
                                            <div id="delivery" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Pay with cash upon delivery.
                                                </p>
                                            </div>
                                        </div>
                                        {{-- <div class="card p-relative">
                                            <div class="card-header">
                                                <a href="#paypal" class="expand">Paypal</a>
                                            </div>
                                            <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="text-primary paypal-que" 
                                                onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); 
                                                return false;">What is PayPal?
                                            </a>
                                            <div id="paypal" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Pay via PayPal, you can pay with your credit cart if you
                                                    don't have a PayPal account.
                                                </p>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End of PageContent -->
</main>
@endsection
@push('website-js')
    <script>
        function priceTotal(number) {
            let priceTotal = $('#cartTotal').text();
            console.log(number)
        }
    </script>
@endpush