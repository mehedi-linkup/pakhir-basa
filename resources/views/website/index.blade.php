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
    @foreach ($popularcategory as $key => $popcat)
    @if(count($popcat->product) > 0)
    <div class="product-wrapper-1 appear-animate mb-5">
        <div class="title-link-wrapper pb-1 mb-4">
            <h2 class="title ls-normal text-uppercase mb-0">MOST POPULAR FOR {{ $popcat->name }}</h2>
            <a href="{{ route('shop.box') }}" class="font-size-normal font-weight-bold ls-25 mb-0">More
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
                       
                        @foreach ($popcat->product as $item)
                            <div class="swiper-slide product-col">
                                <div class="product-wrap product text-center">
                                    <figure class="product-media">
                                        <a href="{{ route('product.details', $item->slug) }}">
                                            <img src="{{ asset('uploads/product/'.$item->image) }}" alt="{{ $item->name }}"
                                                width="216" height="243" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="" class="btn-product-icon btn-cart w-icon-cart" onclick="addToCard({{$item->id}})"
                                                title="Add to cart"></a>
                                            <a href="" class="btn-product-icon btn-quickview w-icon-search" onclick="quickView({{$item->id}})"
                                                title="Quickview"></a>
                                        </div>
                                        @if($item->discount && $item->discount != null)
                                        <div class="product-label-group">
                                            <label class="product-label label-discount">{{ $item->discount }}% Off</label>
                                        </div>
                                        @endif
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="">{{ $item->name }}</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 60%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            {{-- <a href="product-default.html" class="rating-reviews">(3
                                                reviews)</a> --}}
                                        </div>
                                        <div class="product-price">
                                            @if($item->discount && $item->discount != null)
                                            @php
                                                $newPrice = $item->price / 100;
                                                $newPrice = $newPrice * $item->discount;
                                                $newPrice = $item->price - $newPrice;
                                            @endphp
                                            <ins class="new-price">{{ $newPrice  }}</ins><del
                                                class="old-price">{{ $item->price }}</del>
                                            @else
                                            {{ $item->price }}
                                            @endif
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
    @endif
    @endforeach
   
    <!-- End of Product Wrapper 1 -->

   @foreach ($fullAd as $item)
            <div class="banner banner-fashion appear-animate br-sm mb-9" style="background-image: url({{ asset($item->image) }});
            background-color: #383839;">
            <div class="banner-content align-items-center">
                <div class="content-left d-flex align-items-center mb-3">
                    <div class="banner-price-info font-weight-bolder text-secondary text-uppercase lh-1 ls-25">
                        {{$item->discount}}
                        <sup class="font-weight-bold">%</sup><sub class="font-weight-bold ls-25">Off</sub>
                    </div>
                    <hr class="banner-divider bg-white mt-0 mb-0 mr-8">
                </div>
                <div class="content-right d-flex align-items-center flex-1 flex-wrap">
                    <div class="banner-info mb-0 mr-auto pr-4 mb-3">
                        <h3 class="banner-title text-white font-weight-bolder text-uppercase ls-25">{{$item->header}}</h3>
                        <p class="text-white mb-0">
                            <span
                                class="text-dark bg-white font-weight-bold ls-50 pl-1 pr-1 d-inline-block">{{$item->title}}</p>
                    </div>
                    <a href="shop-banner-sidebar.html"
                        class="btn btn-white btn-outline btn-rounded btn-icon-right mb-3">Shop Now<i
                            class="w-icon-long-arrow-right"></i></a>
                </div>
            </div>
            </div>
                
   @endforeach
    <!-- End of Banner Fashion -->


    <h2 class="title title-underline mb-4 ls-normal appear-animate">Our Clients</h2>
    <div class="swiper-container swiper-theme brands-wrapper mb-9 appear-animate" data-swiper-options="{
        'spaceBetween': 0,
        'slidesPerView': 2,
        'autoplay': true,
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
            @foreach ($partner as $item)
            <div class="swiper-slide brand-col">
                <figure class="brand-wrapper">
                    <img src="{{ asset($item->image) }}" alt="{{ $item->name }}" width="410"
                        height="186" />
                </figure>
            </div>
            @endforeach
        </div>
        {{-- <div class="swiper-wrapper row gutter-no cols-xl-6 cols-lg-5 cols-md-4 cols-sm-3 cols-2">
           
        </div> --}}
    </div>
    <!-- End of Brands Wrapper -->
</div>
<!--End of Catainer -->
@endsection
