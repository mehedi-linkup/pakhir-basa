@extends('layouts.website')
@section('website-content')

 <!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav container">
    <ul class="breadcrumb bb-no">
        <li><a href="{{ route('home') }}">Home</a></li>
        <li>Search</li>
    </ul>
</nav>
<!-- End of Breadcrumb -->
 <!-- Start of PageContent -->
 <div class="page-content">
    <div class="container">
        @if ($search_result->count() > 0)
        <div class="product-wrapper row cols-md-1 cols-xs-2 cols-1">
            @foreach ($search_result as $item)
            <div class="product product-list">
                <figure class="product-media">
                    <a href="{{ route('product.details', $item->slug) }}">
                        <img src="{{ asset('uploads/product/'.$item->image) }}" alt="{{ $item->name }}" width="330"
                            height="338" />
                    </a>
                    <div class="product-action-vertical">
                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                            title="Quick View"></a>
                    </div>
                </figure>
                <div class="product-details">
                    <div class="product-cat">
                        <a href="shop-banner-sidebar.html">{{ @$item->category ? $item->category->name : '' }}</a>
                    </div>
                    <h4 class="product-name">
                        <a href="{{ route('product.details', $item->slug) }}">{{ $item->name }}</a>
                    </h4>
                    {{-- <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 100%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="{{ route('product.details', $item->slug) }}" class="rating-reviews">(3 Reviews)</a>
                    </div> --}}
                    <div class="product-price">{{ $item->price }}</div>
                    <ul class="product-desc">
                        {!! $item->short_details !!}
                    </ul>
                    <div class="product-action">
                        <a href="#" class="btn-product btn-cart" title="Add to Cart"><i
                                class="w-icon-cart"></i> Add To Cart</a>
                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                            title="Add to wishlist"></a>
                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                            title="Compare"></a>
                    </div>
                </div>
            </div>
            @endforeach                   
        </div>
        @else
        <h2 class="text-danger text-center">Sorry! Product has no found</h2>
        @endif
    </div>
</div>
<!-- End of PageContent -->
@endsection
