@extends('layouts.website')
@section('website-content')
 <!-- Start of Breadcrumb -->
 <nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="active"><a href="cart.html">Shopping Cart</a></li>
            <li><a href="checkout.html">Checkout</a></li>
            <li><a href="order.html">Order Complete</a></li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->
<div class="page-content cart">
    <div class="container">
        <div class="row gutter-lg mb-10">
            <div class="col-lg-8 pr-lg-4 mb-6">
                <form id="cartUpdate" action="{{ route('cart.update') }}" method="post">
                    @csrf
                <table class="shop-table cart-table">
                    <thead>
                        <tr>
                            <th class="product-name"><span>Product</span></th>
                            <th></th>
                            <th class="product-price"><span>Price</span></th>
                            <th class="product-quantity"><span>Quantity</span></th>
                            <th class="product-subtotal"><span>Subtotal</span></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cartItems as $item)
                        <tr>
                            <td class="product-thumbnail">
                                <div class="p-relative">
                                    @php
                                        $productSlug = \App\Models\Product::find($item->id);
                                    @endphp
                                    <a href="{{ route('product.details', $productSlug->slug) }}">
                                        <figure>
                                            <img src="{{ asset('uploads/product/thumbnail/'.$item->attributes->image) }}" alt="{{ $item->attributes->slug }}"
                                                width="300" height="338">
                                        </figure>
                                    </a>
                                    <button type="submit" class="btn btn-close"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </td>
                            <td class="product-name">
                                <a href="{{ route('product.details', $productSlug->slug) }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            <td id="product-price-{{ $item->id }}" data-price="{{ $item->price }}" class="product-price"><span class="amount">{{ $item->price }}</span></td>
                            <td class="product-quantity">
                                <div class="input-group">
                                    <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                                    <input id="quantity-mod-{{ $item->id }}" class="quantity-mod form-control" type="number" name="quantity[]" min="1" max="100000" value="{{ $item->quantity }}" onkeyup="quantityValue({{$item->id}})">
                                    <button type="button" id="quantity-plus-{{ $item->id }}" class="quantity-plus-mod w-icon-plus" onclick="valueAdd({{ $item->id }})"></button>
                                    <button type="button" id="quantity-minus-{{ $item->id }}" class="quantity-minus-mod w-icon-minus" onclick="valueMinus({{ $item->id }})"></button>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                <span id="quantity-amount-{{$item->id}}" class="amount">{{ $item->price * $item->quantity }}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="cart-action mb-6">
                    <a href="{{ route('shop.box') }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
                    <button type="submit" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</button> 
                    <button type="submit" class="btn btn-rounded btn-update" name="update_cart" value="Update Cart">Update Cart</button>
                </div>
                </form>
                <form class="coupon">
                    <h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
                    <input type="text" class="form-control mb-4" placeholder="Enter coupon code here..." required />
                    <button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
                </form>
            </div>
            <div class="col-lg-4 sticky-sidebar-wrapper">
                <div class="sticky-sidebar">
                    <div class="cart-summary mb-4">
                        <h3 class="cart-title text-uppercase">Cart Totals</h3>
                        {{-- <div class="cart-subtotal d-flex align-items-center justify-content-between">
                            <label class="ls-25">Subtotal</label>
                            <span>$100.00</span>
                        </div> --}}

                        <hr class="divider">

                        {{-- <ul class="shipping-methods mb-2">
                            <li>
                                <label
                                    class="shipping-title text-dark font-weight-bold">Shipping</label>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="free-shipping" class="custom-control-input"
                                        name="shipping">
                                    <label for="free-shipping"
                                        class="custom-control-label color-dark">Free
                                        Shipping</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="local-pickup" class="custom-control-input"
                                        name="shipping">
                                    <label for="local-pickup"
                                        class="custom-control-label color-dark">Local
                                        Pickup</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-radio">
                                    <input type="radio" id="flat-rate" class="custom-control-input"
                                        name="shipping">
                                    <label for="flat-rate" class="custom-control-label color-dark">Flat
                                        rate:
                                        $5.00</label>
                                </div>
                            </li>
                        </ul> --}}

                        {{-- <div class="shipping-calculator">
                            <p class="shipping-destination lh-1">Shipping to <strong>CA</strong>.</p>

                            <form class="shipping-calculator-form">
                                <div class="form-group">
                                    <div class="select-box">
                                        <select name="country" class="form-control form-control-md">
                                            <option value="default" selected="selected">United States
                                                (US)
                                            </option>
                                            <option value="us">United States</option>
                                            <option value="uk">United Kingdom</option>
                                            <option value="fr">France</option>
                                            <option value="aus">Australia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="select-box">
                                        <select name="state" class="form-control form-control-md">
                                            <option value="default" selected="selected">California
                                            </option>
                                            <option value="ohaio">Ohaio</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-md" type="text"
                                        name="town-city" placeholder="Town / City">
                                </div>
                                <div class="form-group">
                                    <input class="form-control form-control-md" type="text"
                                        name="zipcode" placeholder="ZIP">
                                </div>
                                <button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
                                    Totals</button>
                            </form>
                        </div> --}}

                        {{-- <hr class="divider mb-6"> --}}
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <label>Total</label>
                            <span id="order-total" class="ls-50">{{ \Cart::getTotal()}}</span>
                        </div>
                        <a href="{{ route('checkout.index') }}"
                            class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                            Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('website-js')
    <script>
        function valueAdd(id) {
            let quantity = $('#quantity-mod-'+id).val();
            if(quantity <= 100) {
                quantity++;
            }
            $('#quantity-mod-'+id).val(quantity);
            quantityValue(id)
        }

        function valueMinus(id) {
            let quantity = $('#quantity-mod-'+id).val();
            if(quantity > 1) {
                quantity--;
            }
            $('#quantity-mod-'+id).val(quantity);
            quantityValue(id)
        }

        function quantityValue(id) {
            let quantityValue = $('#quantity-mod-'+id).val();
            let productPrice = $('#product-price-'+id).attr("data-price");
            $('#quantity-amount-'+id).text(quantityValue * productPrice);
        }

        // $('#update_cart').click(function (e) {
        //     e.preventDefault();
        //     console.log('update cart')
        // });

    </script>
@endpush