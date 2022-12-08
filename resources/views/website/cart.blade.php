@extends('layouts.website')
@section('website-css')
    <style>
        .old-amount {
            text-decoration: line-through;
            padding-left: 15px;
            font-size: 1.3rem;
            color: #898989;
        }
    </style>
@endsection
@section('website-content')
 <!-- Start of Breadcrumb -->
 <nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb shop-breadcrumb bb-no">
            <li class="active"><a href="{{ route('cart.list') }}">Shopping Cart</a></li>
            <li><a href="{{route('checkout.index')}}">Checkout</a></li>
            <li><a>Order Complete</a></li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->

<div class="page-content cart">
    <div class="container">
        @if(Cart::isEmpty())
        <div class="order-success text-center font-weight-bolder text-dark">
            <i class="fas fa-check"></i>
            Your cart is empty.
        </div>
        @else
        <!-- End of Order Success -->
        <div class="row gutter-lg mb-5">
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
                        <input id="cartDeleteId" type="hidden" name="cartDeleteId" value="">
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
                                    
                                    <button type="submit" class="btn btn-close" onclick="cartDelete({{$item->id}})"><i
                                            class="fas fa-times"></i></button>
                                </div>
                            </td>
                            <td class="product-name">
                                <a href="{{ route('product.details', $productSlug->slug) }}">
                                    {{ $item->name }}
                                </a>
                            </td>
                            @if($item->attributes->offer_price == "" || $item->attributes->offer_price == null)
                            <td id="product-price-{{ $item->id }}" data-price="{{ $item->price }}" class="product-price"><span class="amount">{{ $item->price }}</span>TK</td>
                            @else
                            <td id="product-price-{{ $item->id }}" data-price="{{ $item->attributes->offer_price }}" class="product-price"><span class="amount">{{ $item->attributes->offer_price }}TK</span><span class="old-amount">{{ $item->price }}TK</span></td>
                            @endif
                            <td class="product-quantity">
                                <div class="input-group">
                                    <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                                    <input id="quantity-mod-{{ $item->id }}" class="quantity-mod form-control" type="number" name="quantity[]" min="1" max="100000" value="{{ $item->quantity }}" onkeyup="quantityValue({{$item->id}})">
                                    <button type="button" id="quantity-plus-{{ $item->id }}" class="quantity-plus-mod w-icon-plus" onclick="valueAdd({{ $item->id }})"></button>
                                    <button type="button" id="quantity-minus-{{ $item->id }}" class="quantity-minus-mod w-icon-minus" onclick="valueMinus({{ $item->id }})"></button>
                                </div>
                            </td>
                            <td class="product-subtotal">
                                @if($item->attributes->offer_price == "" || $item->attributes->offer_price == null)
                                <span id="quantity-amount-{{$item->id}}" class="amount">{{ $item->price * $item->quantity }}TK</span>
                                @else
                                <span id="quantity-amount-{{$item->id}}" class="amount">{{ $item->attributes->offer_price * $item->quantity }}TK</span>
                                @endif
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
            </div>
            <div class="col-lg-4 sticky-sidebar-wrapper">
                <div class="sticky-sidebar">
                    <div class="cart-summary mb-4">
                        <h3 class="cart-title text-uppercase">Cart Totals</h3>
                        <hr class="divider">
                        <div class="order-total d-flex justify-content-between align-items-center">
                            <label>Total</label>
                            <span id="order-total" class="ls-50">{{ $customSubtotal }}TK</span>
                            {{-- <span id="order-total" class="ls-50">{{ \Cart::getTotal()}}</span> --}}
                        </div>
                        <a href="{{ route('checkout.index') }}"
                            class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                            Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
@push('website-js')
    <script>
        function cartDelete(id) {
            let something = $('#cartDeleteId').val(id);
        }
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
            $('#quantity-amount-'+id).text(quantityValue * productPrice + "TK");
        }
        
    </script>
@endpush