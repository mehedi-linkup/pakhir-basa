@extends('layouts.website')
@section('website-css')
<link rel="stylesheet" type="text/css" href="{{ asset('website/assets/css/home.min.css') }}">
@endsection
@section('website-content')
<section class="intro-section">
    <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide nav-xxl-show nav-hide"
        data-swiper-options="{
        'slidesPerView': 1,
        'autoplay': {
            'delay': 8000,
            'disableOnInteraction': false
        }
    }">
        <div class="swiper-wrapper">
            @foreach ($banner as $key => $item)
            <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
            style="background-image: url({{ asset($item->bgimage) }}); background-color: #ebeef2;">
                <div class="container">
                    <figure class="slide-image skrollable slide-animate">
                        <img src="{{ asset($item->image) }}" alt="Banner"
                            data-bottom-top="transform: translateY(10vh);"
                            data-top-bottom="transform: translateY(-10vh);" width="474" height="397">
                    </figure>
                    <div class="banner-content y-50 text-right">
                        <h5 class="banner-subtitle font-weight-normal text-default ls-50 lh-1 mb-2 slide-animate"
                            data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.2s'
                    }">
                            {{ $item->offer_name }}
                        </h5>
                        <h3 class="banner-title font-weight-bolder ls-25 lh-1 slide-animate"
                            data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.4s'
                    }">
                            {{ $item->title }}
                        </h3>
                        <div class="font-weight-normal text-default slide-animate" data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.6s'
                        }">
                            {!! $item->short_details !!}
                        </div>

                        <a href="{{ $item->offer_link }}"
                            class="btn btn-dark btn-outline btn-rounded btn-icon-right slide-animate"
                            data-animation-options="{
                        'name': 'fadeInRightShorter',
                        'duration': '1s',
                        'delay': '.8s'
                    }">SHOP NOW<i class="w-icon-long-arrow-right"></i></a>

                    </div>
                    <!-- End of .banner-content -->
                </div>
                <!-- End of .container -->
            </div> 
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
        <button class="swiper-button-next"></button>
        <button class="swiper-button-prev"></button>
    </div>
    <!-- End of .swiper-container -->
</section>
<!-- End of .intro-section -->

{{-- <div class="container">
    <div class="swiper-container appear-animate icon-box-wrapper br-sm mt-6 mb-6" data-swiper-options="{
        'slidesPerView': 1,
        'loop': false,
        'breakpoints': {
            '576': {
                'slidesPerView': 2
            },
            '768': {
                'slidesPerView': 3
            },
            '1200': {
                'slidesPerView': 4
            }
        }
    }">
        <div class="swiper-wrapper row cols-md-4 cols-sm-3 cols-1">
            <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                <span class="icon-box-icon icon-shipping">
                    <i class="w-icon-truck"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bold mb-1">Free Shipping & Returns</h4>
                    <p class="text-default">For all orders over $99</p>
                </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side icon-box-primary">
                <span class="icon-box-icon icon-payment">
                    <i class="w-icon-bag"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bold mb-1">Secure Payment</h4>
                    <p class="text-default">We ensure secure payment</p>
                </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-money">
                <span class="icon-box-icon icon-money">
                    <i class="w-icon-money"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bold mb-1">Money Back Guarantee</h4>
                    <p class="text-default">Any back within 30 days</p>
                </div>
            </div>
            <div class="swiper-slide icon-box icon-box-side icon-box-primary icon-box-chat">
                <span class="icon-box-icon icon-chat">
                    <i class="w-icon-chat"></i>
                </span>
                <div class="icon-box-content">
                    <h4 class="icon-box-title font-weight-bold mb-1">Customer Support</h4>
                    <p class="text-default">Call or email us 24/7</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Iocn Box Wrapper -->         
</div> --}}

<section class="category-section top-category bg-grey pt-10 pb-10 appear-animate">
    <div class="container pb-2">
        <h2 class="title justify-content-center pt-1 ls-normal mb-5">Top Categories Of All Time</h2>
        <div class="swiper">
            <div class="swiper-container swiper-theme pg-show" data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 2,
                'autoplay': true,
                'breakpoints': {
                    '576': {
                        'slidesPerView': 3
                    },
                    '768': {
                        'slidesPerView': 5
                    },
                    '992': {
                        'slidesPerView': 6
                    }
                }
            }">
                <div class="swiper-wrapper row cols-lg-6 cols-md-5 cols-sm-3 cols-2">
                    @foreach ($topcategory as $item)
                    <div
                        class="swiper-slide category category-classic category-absolute overlay-zoom br-xs">
                        <a href="{{ route('shop.box') }}" class="category-media">
                            <img src="{{ asset($item->image) }}" alt="{{ $item->name }}"
                                width="130" height="130">
                        </a>
                        <div class="category-content">
                            <h4 class="category-name">{{ $item->name }}</h4>
                            <a href="{{ route('shop.box') }}"
                                class="btn btn-primary btn-link btn-underline">Shop
                                Now</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End of .category-section top-category -->

<div class="container">
    <!-- <div class="row category-cosmetic-lifestyle appear-animate mb-5">
        <div class="col-md-6 mb-4">
            <div class="banner banner-fixed category-banner-1 br-xs">
                <figure>
                    <img src="{{ asset('/') }}website/images/demos/demo1/categories/3-1.jpg" alt="Category Banner"
                        width="610" height="200" style="background-color: #3B4B48;" />
                </figure>
                <div class="banner-content y-50 pt-1">
                    <h5 class="banner-subtitle font-weight-bold text-uppercase">Natural Process</h5>
                    <h3 class="banner-title font-weight-bolder text-capitalize text-white">Cosmetic
                        Makeup<br>Professional</h3>
                    <a href="shop-banner-sidebar.html"
                        class="btn btn-white btn-link btn-underline btn-icon-right">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-4">
            <div class="banner banner-fixed category-banner-2 br-xs">
                <figure>
                    <img src="{{ asset('/') }}website/images/demos/demo1/categories/3-2.jpg" alt="Category Banner"
                        width="610" height="200" style="background-color: #E5E5E5;" />
                </figure>
                <div class="banner-content y-50 pt-1">
                    <h5 class="banner-subtitle font-weight-bold text-uppercase">Trending Now</h5>
                    <h3 class="banner-title font-weight-bolder text-capitalize">Women's
                        Lifestyle<br>Collection</h3>
                    <a href="shop-banner-sidebar.html"
                        class="btn btn-dark btn-link btn-underline btn-icon-right">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- End of Category Cosmetic Lifestyle -->

    <div class="product-wrapper-1 appear-animate mb-5">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">MOST POPULAR HUMAN PRODUCTS</h2>
            <a href="" class="font-size-normal font-weight-bold ls-25 mb-0">More
                Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-sm-8">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 5
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                       @foreach ($product as $item)
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="#">
                                        <img src="{{ asset('uploads/product/'.$item->image) }}" alt="{{ $item->name }}"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Black Winter
                                            Skating</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$40.86</ins><del
                                            class="old-price">$45.89</del>
                                    </div>
                                </div>
                            </div>
                        </div>                           
                       @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Product Wrapper 1 -->

    <div class="product-wrapper-1 appear-animate mb-8">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">MOST POPULAR FOR CAT</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
                Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="row">
      
            <!-- End of Banner -->
            <div class="col-lg-12 col-sm-8">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 5
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-1-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-1-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">6% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Professional
                                            Pixel
                                            Camera</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$215.68</ins><del
                                            class="old-price">$230.45</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-5.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Latest
                                            Speaker</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$250.68</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-2-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-2-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Wash Machine</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$215.68</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-6.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Security
                                            Guard</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$320.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-3.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">10% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">HD
                                            Television</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$450.68</ins><del
                                            class="old-price">$500.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">10% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">USB Receipt</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$26.89</ins><del
                                            class="old-price">$29.79</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-3.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">10% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">HD
                                            Television</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$450.68</ins><del
                                            class="old-price">$500.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">10% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">USB Receipt</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$26.89</ins><del
                                            class="old-price">$29.79</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-4.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Data Transformer
                                            Tool</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(6
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$64.47</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/5-8.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">7% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Multi Functional
                                            Apple iPhone</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$136.26</ins><del
                                            class="old-price">$145.90</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- End of Produts -->
            </div>
        </div>
    </div>
    <!-- End of Product Wrapper 1 -->

    <div class="banner banner-fashion appear-animate br-sm mb-9" style="background-image: url({{ asset('/') }}website/images/demos/demo1/banners/4.jpg);
        background-color: #383839;">
        <div class="banner-content align-items-center">
            <div class="content-left d-flex align-items-center mb-3">
                <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                    25
                    <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                </div>
                <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
            </div>
            <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                    <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">For Today's
                        Fashion</h3>
                    <p class="text-white mb-0">Use code
                        <span
                            class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">Black
                            <strong>12345</strong></span> to get best offer.</p>
                </div>
                <a href="shop-banner-sidebar.html"
                    class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                        class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
    </div>
    <!-- End of Banner Fashion -->

    <div class="product-wrapper-1 appear-animate mb-7">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">MOST POPULAR FOR DOG</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
                Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="row">
            <!-- <div class="col-lg-3 col-sm-4 mb-4">
                <div class="banner h-100 br-sm" style="background-image: url({{ asset('/') }}website/images/demos/demo1/banners/5.jpg); 
                background-color: #EAEFF3;">
                    <div class="banner-content content-top">
                        <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                        <hr class="banner-divider bg-dark mb-2">
                        <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                            Trending <br> <span class="font-weight-normal text-capitalize">House
                                Utensil</span>
                        </h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-dark btn-outline btn-rounded btn-sm">shop now</a>
                    </div>
                </div>
            </div> -->
            <!-- End of Banner -->
            <div class="col-lg-12 col-sm-8">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 5
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-1.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Home Sofa</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$75.99</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-5.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric
                                            Rice-Cooker</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$215.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-2-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-2-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">21% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Kitchen
                                            Table</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$75.50</ins><del
                                            class="old-price">$95.68</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-6.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Kitchen
                                            Cooker</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$150.60</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Table Lamp</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$45.60</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">12% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric Frying
                                            Pan</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$137.35</ins><del
                                            class="old-price">$155.65</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Table Lamp</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$45.60</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">12% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric Frying
                                            Pan</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$137.35</ins><del
                                            class="old-price">$155.65</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-4.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">18% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Latest Chair</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(6
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$70.00</ins><del
                                            class="old-price">$85.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-8-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-8-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Automatic
                                            Crusher</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$220.25</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- End of Produts -->
            </div>
        </div>
    </div>
    <!-- End of Product Wrapper 1 -->
    <!-- for bird section start -->
    <div class="product-wrapper-1 appear-animate mb-7">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">MOST POPULAR FOR BIRD</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
                Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="row">
            <!-- <div class="col-lg-3 col-sm-4 mb-4">
                <div class="banner h-100 br-sm" style="background-image: url({{ asset('/') }}website/images/demos/demo1/banners/5.jpg); 
                background-color: #EAEFF3;">
                    <div class="banner-content content-top">
                        <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                        <hr class="banner-divider bg-dark mb-2">
                        <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                            Trending <br> <span class="font-weight-normal text-capitalize">House
                                Utensil</span>
                        </h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-dark btn-outline btn-rounded btn-sm">shop now</a>
                    </div>
                </div>
            </div> -->
            <!-- End of Banner -->
            <div class="col-lg-12 col-sm-8">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 5
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-1.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Home Sofa</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$75.99</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-5.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric
                                            Rice-Cooker</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$215.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-2-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-2-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">21% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Kitchen
                                            Table</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$75.50</ins><del
                                            class="old-price">$95.68</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-6.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Kitchen
                                            Cooker</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$150.60</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Table Lamp</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$45.60</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">12% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric Frying
                                            Pan</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$137.35</ins><del
                                            class="old-price">$155.65</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Table Lamp</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$45.60</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">12% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric Frying
                                            Pan</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$137.35</ins><del
                                            class="old-price">$155.65</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-4.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">18% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Latest Chair</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(6
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$70.00</ins><del
                                            class="old-price">$85.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-8-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-8-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Automatic
                                            Crusher</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$220.25</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- End of Produts -->
            </div>
        </div>
    </div>
    <!-- for bird section end -->
    <!-- for fosh section start -->
    <div class="product-wrapper-1 appear-animate mb-7">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal mb-0">MOST POPULAR FOR FISH</h2>
            <a href="shop-boxed-banner.html" class="font-size-normal font-weight-bold ls-25 mb-0">More
                Products<i class="w-icon-long-arrow-right"></i></a>
        </div>
        <div class="row">
            <!-- <div class="col-lg-3 col-sm-4 mb-4">
                <div class="banner h-100 br-sm" style="background-image: url({{ asset('/') }}website/images/demos/demo1/banners/5.jpg); 
                background-color: #EAEFF3;">
                    <div class="banner-content content-top">
                        <h5 class="banner-subtitle font-weight-normal mb-2">Deals And Promotions</h5>
                        <hr class="banner-divider bg-dark mb-2">
                        <h3 class="banner-title font-weight-bolder text-uppercase ls-25">
                            Trending <br> <span class="font-weight-normal text-capitalize">House
                                Utensil</span>
                        </h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-dark btn-outline btn-rounded btn-sm">shop now</a>
                    </div>
                </div>
            </div> -->
            <!-- End of Banner -->
            <div class="col-lg-12 col-sm-8">
                <div class="swiper-container swiper-theme" data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 2,
                    'breakpoints': {
                        '992': {
                            'slidesPerView': 3
                        },
                        '1200': {
                            'slidesPerView': 5
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-lg-3 cols-2">
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-1.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Home Sofa</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$75.99</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-5.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric
                                            Rice-Cooker</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$215.00</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-2-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-2-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">21% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Kitchen
                                            Table</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$75.50</ins><del
                                            class="old-price">$95.68</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-6.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Kitchen
                                            Cooker</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$150.60</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Table Lamp</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$45.60</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">12% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric Frying
                                            Pan</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$137.35</ins><del
                                            class="old-price">$155.65</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-3-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Table Lamp</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 60%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(3
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$45.60</ins>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-7.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">12% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Electric Frying
                                            Pan</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(5
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$137.35</ins><del
                                            class="old-price">$155.65</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide product-col">
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-4.jpg" alt="Product"
                                            width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                    <div class="product-label-group">
                                        <label class="product-label label-discount">18% Off</label>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Latest Chair</a>
                                    </h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(6
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$70.00</ins><del
                                            class="old-price">$85.00</del>
                                    </div>
                                </div>
                            </div>
                            <div class="product-wrap product text-center">
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-8-1.jpg"
                                            alt="Product" width="216" height="243" />
                                        <img src="{{ asset('/') }}website/images/demos/demo1/products/6-8-2.jpg"
                                            alt="Product" width="216" height="243" />
                                    </a>
                                    <div class="product-action-vertical">
                                        <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                            title="Add to cart"></a>
                                        <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                            title="Add to wishlist"></a>
                                        <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                            title="Quickview"></a>
                                        <a href="#" class="btn-product-icon btn-compare w-icon-compare"
                                            title="Add to Compare"></a>
                                    </div>
                                </figure>
                                <div class="product-details">
                                    <h4 class="product-name"><a href="product-default.html">Automatic
                                            Crusher</a></h4>
                                    <div class="ratings-container">
                                        <div class="ratings-full">
                                            <span class="ratings" style="width: 100%;"></span>
                                            <span class="tooltiptext tooltip-top"></span>
                                        </div>
                                        <a href="product-default.html" class="rating-reviews">(9
                                            reviews)</a>
                                    </div>
                                    <div class="product-price">
                                        <ins class="new-price">$220.25</ins>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
                <!-- End of Produts -->
            </div>
        </div>
    </div>
    <!-- for fosh section end -->

    <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Clients</h2>
    <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{
        'spaceBetween': 0,
        'slidesPerView': 2,
        'breakpoints': {
            '576': {
                'slidesPerView': 3
            },
            '768': {
                'slidesPerView': 4
            },
            '992': {
                'slidesPerView': 5
            },
            '1200': {
                'slidesPerView': 6
            }
        }
    }">
        <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/1.png" alt="Brand" width="410"
                        height="186" />
                </figure>
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/2.png" alt="Brand" width="410"
                        height="186" />
                </figure>
            </div>
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/3.png" alt="Brand" width="410"
                        height="186" />
                </figure>
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/4.png" alt="Brand" width="410"
                        height="186" />
                </figure>
            </div>
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/5.png" alt="Brand" width="410"
                        height="186" />
                </figure>
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/6.png" alt="Brand" width="410"
                        height="186" />
                </figure>
            </div>
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/7.png" alt="Brand" width="410"
                        height="186" />
                </figure>
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/8.png" alt="Brand" width="410"
                        height="186" />
                </figure>
            </div>
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/9.png" alt="Brand" width="410"
                        height="186" />
                </figure>
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/10.png" alt="Brand" width="410"
                        height="186" />
                </figure>
            </div>
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/11.png" alt="Brand" width="410"
                        height="186" />
                </figure>
                <figure class="brand-wrapper">
                    <img src="{{ asset('/') }}website/images/demos/demo1/brands/12.png" alt="Brand" width="410"
                        height="186" />
                </figure>
            </div>
        </div>
    </div>
    <!-- End of Brands Wrapper -->
</div>
<!--End of Catainer -->
@endsection
