@extends('layouts.website')
@section('website-css')
    <style>
        .btn-close {
            position: absolute;
            top: 0.6rem;
            right: .1rem;
        }
    </style>
@endsection
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
            @php
                $user = Auth::guard('customer')->user();
            @endphp

            @if(!$user)
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
                            <input type="email" class="form-control form-control-md" name="email" id="email" value="{{ old('email') }}"
                                required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" class="form-control form-control-md" name="password" id="password" value="{{ old('password') }}"
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
                        @if(@$errors->any())
                        <div class="alert alert-icon alert-warning alert-bg alert-inline show-code-action">
                            <h4 class="alert-title">
                                <i class="w-icon-exclamation-triangle"></i>
                                Warning!</h4> Error occured check input fields and also "Ship to different address fields.
                            <button class="btn btn-link btn-close" aria-label="button">
                                <i class="close-icon"></i>
                            </button>
                        </div>
                        @endif
                       
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                       
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Name *</label>
                                    <input type="hidden" name="customer_id" value="{{ @$user->id }}">
                                    <input type="text" class="form-control form-control-md @error('name') is-invalid @enderror" name="name" value="{{ @old('name') ? old('name') : @$user->name }}" {{ @$user?'readonly' : '' }}
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
                                    <input type="text" class="form-control form-control-md @error('phone') is-invalid @enderror" name="phone" value="{{ @old('phone') ? old('phone') : @$user->phone }}" placeholder="Enter Phone" {{ @$user?'readonly' : '' }}>
        
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input type="email" class="form-control form-control-md @error('email') is-invalid @enderror" name="email" value="{{ @old('email') ? old('email') : @$user->email }}" placeholder="Enter Email" {{ @$user?'readonly' : '' }}>
        
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Divison</label>
                                    <div class="select-box">
                                        <select name="division_id" class="form-control form-control-md @error('division_id') is-invalid @enderror" {{ @$user?'disabled' : '' }}>
                                            <option value="">Select Division</option>
                                            @foreach ($division as $item)
                                            <option value="{{ $item->id }}" {{ @$user->division_id == $item->id || old('division_id') == $item->id ? 'selected': '' }}>{{ $item->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('division_id')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>District</label>
                                    <div class="select-box">
                                        <select name="district_id" class="form-control form-control-md @error('district_id') is-invalid @enderror" {{ @$user?'disabled' : '' }}>
                                            <option value="">Select District</option>
                                            @foreach ($district as $item)
                                            <option value="{{ $item->id }}" {{ @$user->district_id == $item->id || old('district_id') == $item->id ? 'selected': '' }}>{{ $item->bn_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('district_id')
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
                                        <select name="thana_id" class="form-control form-control-md @error('thana_id') is-invalid @enderror" {{ @$user?'disabled' : '' }}>
                                            <option value="">Select Thana</option>
                                            @foreach ($thana as $item)
                                            <option value="{{ $item->id }}" {{ @$user->thana_id == $item->id || old('thana_id') == $item->id ? 'selected': '' }}>{{ $item->bn_name }}</option>
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
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Union</label>
                                    <div class="select-box">
                                        <select name="union_id" class="form-control form-control-md @error('union_id') is-invalid @enderror" {{ @$user?'disabled' : '' }}>
                                            <option value="" selected="selected">Select Union</option>
                                            @foreach ($union as $item)
                                            <option value="{{ $item->id }}" {{ @$user->union_id == $item->id || old('union_id') == $item->id ? 'selected' : '' }}>{{ $item->bn_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('union_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mt-3">
                            <label for="address">Address *</label>
                            <textarea class="form-control mb-0 @error('address') is-invalid @enderror" id="address" name="address" cols="30"
                                rows="4"
                                placeholder="Enter Address" {{ @$user?'readonly' : '' }}>{{ @old('address') ? old('address') : @$user->address }}</textarea>
                            @error('address')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group checkbox-toggle pb-2">
                            <input type="checkbox" class="custom-checkbox" id="shipping-toggle"
                                name="shipping-toggle">
                            <label for="shipping-toggle">Ship to a different address?</label>
                        </div>
                        <div class="checkbox-content">
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="s_name">Name *</label>
                                        <input type="text" class="form-control form-control-md" name="s_name"
                                            placeholder="Enter Name" value="{{ old('s_name') }}">
    
                                        @error('s_name')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="s_phone">Phone Number</label>
                                        <input type="text" class="form-control form-control-md" name="s_phone" value="{{ old('s_phone') }}" placeholder="Enter Email">
            
                                        @error('s_phone')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="s_email">Email Address</label>
                                        <input type="email" class="form-control form-control-md" name="s_email" value="{{ old('s_email') }}" placeholder="Enter Email">
            
                                        @error('s_email')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Division</label>
                                        <div class="select-box">
                                            <select name="s_division_id" class="form-control form-control-md">
                                                <option value="">Select Division</option>
                                                @foreach ($division as $item)
                                                <option value="{{ $item->id }}" {{ old('s_division_id') == $item->id ? 'selected' : '' }}>{{ $item->bn_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('s_division_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>District</label>
                                        <div class="select-box">
                                            <select name="s_district_id" class="form-control form-control-md">
                                                <option value="">Select District</option>
                                                
                                            </select>
                                        </div>
                                        @error('s_district_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Thana</label>
                                        <div class="select-box">
                                            <select name="s_thana_id" class="form-control form-control-md">
                                                <option value="">Select Thana</option>
                                               
                                            </select>
                                        </div>
                                        @error('s_thana_id')
                                            <span class="text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Union</label>
                                        <div class="select-box">
                                            <select name="s_union_id" class="form-control form-control-md">
                                                <option value="">Select Union</option>
                                               
                                            </select>
                                            @error('s_union_id')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="form-group mt-3">
                                <label for="s_address">Address *</label>
                                <textarea class="form-control mb-0" id="s_address" name="s_address" cols="30"
                                    rows="4"
                                    placeholder="Enter Address">{{ old('s_address') }}</textarea>

                                    @error('s_address')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="order-note">Order notes (optional)</label>
                            <textarea class="form-control mb-0 @error('order_note') is-invalid  @enderror" id="order_note" name="order_note" cols="30"
                                rows="3"
                                placeholder="Notes about your order, e.g special notes for delivery" >{{ @old('order_note') ? old('order_note') : @$user->order_note }}</textarea>
                            @error('order_note')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4 sticky-sidebar-wrapper">
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
                                            @if($item->attributes->offer_price == "" || $item->attributes->offer_price == null)
                                            <td class="product-name">{{ $item->price }}TK</td>
                                            @else
                                            <td class="product-name">{{ $item->attributes->offer_price }}TK</td>
                                            @endif
                                            @if($item->attributes->offer_price == "" || $item->attributes->offer_price == null)
                                            <td class="product-total">{{ $item->quantity * $item->price }}TK</td>
                                            @else
                                            <td class="product-total">{{ $item->quantity * $item->attributes->offer_price }}TK</td>
                                            @endif
                                        </tr>
                                        @endforeach
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td></td>
                                            <td>
                                                <b id="cartTotal">{{ $customSubtotal }}TK</b>
                                                {{-- <b id="cartTotal">{{ \Cart::getTotal() }}</b> --}}
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Delivery Charge</b>
                                            </td>
                                            <td></td>
                                            <td>
                                                <b id="deliveryCharge">
                                                    @if(@$user)
                                                    {{ $user->district_id == 65 ? 60 : 120}}
                                                    @else
                                                    0
                                                    @endif
                                                </b>
                                                <b>TK</b>
                                                <input id="shipping_cost" type="hidden" name="shipping_cost" value="">
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
                                                {{-- <b id="priceTotal">{{ \Cart::getTotal() }}</b> --}}
                                                <b id="priceTotal">{{ $customSubtotal + 60 }}TK</b>
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
                                    <button id="order-button" type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
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
        var shippedDifferenton = false;
        function priceTotal(number) {
            let priceTotal = $('#cartTotal').text();
            console.log(number)
        }
    </script>
    <script>
        $('#order-button').click(function () {
            var deliveryCharge = $('#deliveryCharge').text();
            $('input[name="shipping_cost"]').val(+deliveryCharge);
            $('select[name="division_id"]').attr('disabled', false);
            $('select[name="district_id"]').attr('disabled', false);
            $('select[name="thana_id"]').attr('disabled', false);
            $('select[name="union_id"]').attr('disabled', false);
        });
    </script>

    <script>
        $('select[name="division_id"]').on('change', function() {
            var division_id = this.value;
            if(division_id) {
                $.ajax({
                    url: '{{ url("/district/get") }}/'+division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="district_id"]').empty();
                        $('select[name="district_id"]').append('<option value="">Select District</option>');
                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value.id +'">'+ value.bn_name +'</option>');
                        });
                    }
                })
            } else {
                alert('Please select division');
            }
        });


        $('select[name="district_id"]').on('change', function() {
            var district_id = this.value;
            if(district_id) {
                $.ajax({
                    url: '{{ url("/thana/get") }}/'+district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="thana_id"]').empty();
                        $('select[name="thana_id"]').append('<option value="">Select Thana</option>');
                        $.each(data, function(key, value){
                            $('select[name="thana_id"]').append('<option value="'+ value.id +'">'+ value.bn_name +'</option>');
                        });
                    }
                })
            } else {
                alert('Please select district');
            }

            if(shippedDifferenton == false) {
                if(district_id == 65) {
                    $('#deliveryCharge').text(60);
                } else {
                    $('#deliveryCharge').text(120);
                }
            }
        });

        $('select[name="thana_id"]').on('change', function() {
            var thana_id = this.value;
            if(thana_id) {
                $.ajax({
                    url: '{{ url("/union/get") }}/'+thana_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="union_id"]').empty();
                        $('select[name="union_id"]').append('<option value="">Select Union</option>');
                        $.each(data, function(key, value){
                            $('select[name="union_id"]').append('<option value="'+ value.id +'">'+ value.bn_name +'</option>');
                        });
                    }
                })
            } else {
                alert('Please select Thana');
            }
        });

        $('select[name="s_division_id"]').on('change', function() {
            var division_id = this.value;
            shippedDifferenton = true;
            if(division_id) {
                $.ajax({
                    url: '{{ url("/district/get") }}/'+division_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="s_district_id"]').empty();
                        $('select[name="s_district_id"]').append('<option value="">Select District</option>');
                        $.each(data, function(key, value){
                            $('select[name="s_district_id"]').append('<option value="'+ value.id +'">'+ value.bn_name +'</option>');
                        });
                    }
                })
            } else {
                alert('Please select shipping division');
            }
        });


        $('select[name="s_district_id"]').on('change', function() {
            var district_id = this.value;
            if(district_id) {
                $.ajax({
                    url: '{{ url("/thana/get") }}/'+district_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="s_thana_id"]').empty();
                        $('select[name="s_thana_id"]').append('<option value="">Select Thana</option>');
                        $.each(data, function(key, value){
                            $('select[name="s_thana_id"]').append('<option value="'+ value.id +'">'+ value.bn_name +'</option>');
                        });
                    }
                })
            } else {
                alert('Please select shipping district');
            }

            if(district_id == 65) {
                $('#deliveryCharge').text(60);
            } else {
                $('#deliveryCharge').text(120);
            }
        });

        $('select[name="s_thana_id"]').on('change', function() {
            var thana_id = this.value;
            if(thana_id) {
                $.ajax({
                    url: '{{ url("/union/get") }}/'+thana_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        var d = $('select[name="s_union_id"]').empty();
                        $('select[name="s_union_id"]').append('<option value="">Select Union</option>');
                        $.each(data, function(key, value){
                            $('select[name="s_union_id"]').append('<option value="'+ value.id +'">'+ value.bn_name +'</option>');
                        });
                    }
                })
            } else {
                alert('Please select shipping union');
            }
        });
        // $('input[name="shipping-toggle"]').change(function () {
        //     alert('changed');
        // });

    </script>
@endpush