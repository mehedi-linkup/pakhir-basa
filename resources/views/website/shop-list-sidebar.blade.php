@extends('layouts.website')
@section('website-content')
 <!-- Start of Breadcrumb -->
 <nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb bb-no">
            <li><a href="demo1.html">Home</a></li>
            <li><a href="shop-banner-sidebar.html">Shop</a></li>
            <li>List Sidebar</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->
 <!-- Start of Page Content -->
 <div class="page-content">
    <div class="container">
        {{-- <!-- Start of Shop Banner -->
        <div class="shop-default-banner banner d-flex align-items-center mb-5 br-xs"
            style="background-image: url(assets/images/shop/banner1.jpg); background-color: #FFC74E;">
            <div class="banner-content">
                <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-normal">Smart Wrist
                    Watches</h3>
                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                    Now<i class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
        <!-- End of Shop Banner --> --}}

        <!-- Start of Shop Category -->
        <div class="shop-default-category category-ellipse-section mb-6">
            <div class="swiper-container swiper-theme shadow-swiper"
                data-swiper-options="{
                'spaceBetween': 20,
                'slidesPerView': 2,
                'breakpoints': {
                    '480': {
                        'slidesPerView': 3
                    },
                    '576': {
                        'slidesPerView': 4
                    },
                    '768': {
                        'slidesPerView': 6
                    },
                    '992': {
                        'slidesPerView': 7
                    },
                    '1200': {
                        'slidesPerView': 8,
                        'spaceBetween': 30
                    }
                }
            }">
                <div class="swiper-wrapper row gutter-lg cols-xl-8 cols-lg-7 cols-md-6 cols-sm-4 cols-xs-3 cols-2">
                    @foreach ($category->take(8) as $item)
                    <div class="swiper-slide category-wrap">
                        <div class="category category-ellipse">
                            <figure class="category-media">
                                <a href="">
                                    <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                        width="190" height="190" style="background-color: #5C92C0;" />
                                </a>
                            </figure>
                            <div class="category-content">
                                <h4 class="category-name">
                                    <a href="">{{ $item->name }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>                        
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <!-- End of Shop Category -->

        <!-- Start of Shop Content -->
        <div class="shop-content row gutter-lg mb-10">
            <!-- Start of Sidebar, Shop Sidebar -->
            <aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
                <!-- Start of Sidebar Overlay -->
                <div class="sidebar-overlay"></div>
                <a class="sidebar-close" href="#"><i class="close-icon"></i></a>


                <!-- Start of Sidebar Content -->
                <div class="sidebar-content scrollable">
                    <!-- Start of Sticky Sidebar -->
                    <div class="sticky-sidebar">
                        {{-- <div class="filter-actions">
                            <label>Filter :</label>
                            <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                        </div> --}}
                        <!-- Start of Collapsible widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>All Categories</span></h3>
                            <ul class="widget-body filter-items search-ul">
                                @foreach ($category as $item)
                                <li><a href="#">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Price</span></h3>
                            <div class="widget-body">
                                <ul class="filter-items search-ul">
                                    <li><a href="#">$0.00 - $100.00</a></li>
                                    <li><a href="#">$100.00 - $200.00</a></li>
                                    <li><a href="#">$200.00 - $300.00</a></li>
                                    <li><a href="#">$300.00 - $500.00</a></li>
                                    <li><a href="#">$500.00+</a></li>
                                </ul>
                                <form class="price-range">
                                    <input type="number" name="min_price" class="min_price text-center"
                                        placeholder="$min"><span class="delimiter">-</span><input
                                        type="number" name="max_price" class="max_price text-center"
                                        placeholder="$max"><a href="#"
                                        class="btn btn-primary btn-rounded">Go</a>
                                </form>
                            </div>
                        </div> --}}
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Size</span></h3>
                            <ul class="widget-body filter-items item-check mt-1">
                                @foreach ($size as $item)
                                <li><a href="#">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Brand</span></h3>
                            <ul class="widget-body filter-items item-check mt-1">
                                <li><a href="#">Elegant Auto Group</a></li>
                                <li><a href="#">Green Grass</a></li>
                                <li><a href="#">Node Js</a></li>
                                <li><a href="#">NS8</a></li>
                                <li><a href="#">Red</a></li>
                                <li><a href="#">Skysuite Tech</a></li>
                                <li><a href="#">Sterling</a></li>
                            </ul>
                        </div> --}}
                        <!-- End of Collapsible Widget -->

                        <!-- Start of Collapsible Widget -->
                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Color</span></h3>
                            <ul class="widget-body filter-items item-check mt-1">
                                @foreach ($color as $item)
                                <li><a href="">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div> --}}
                        <!-- End of Collapsible Widget -->
                    </div>
                    <!-- End of Sidebar Content -->
                </div>
                <!-- End of Sidebar Content -->
            </aside>
            <!-- End of Shop Sidebar -->

            <!-- Start of Shop Main Content -->
            <div class="main-content">
                <nav class="toolbox sticky-toolbox sticky-content fix-top sidebar-fixed">
                    <div class="toolbox-left">
                        <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                            btn-icon-left d-block d-lg-none"><i
                                class="w-icon-category"></i><span>Filters</span></a>
                    </div>
                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-layout">
                            <a href="{{ route('shop.box', ['shop_view'=>'shop box']) }}" class="icon-mode-grid btn-layout active">
                                <i class="w-icon-grid"></i>
                            </a>
                            <a href="{{ route('shop.box', ['shop_view'=>'shop list']) }}" class="icon-mode-list btn-layout">
                                <i class="w-icon-list"></i>
                            </a>
                            <a href="{{ route('shop.box', ['shop_view'=>'shop list sidebar']) }}" class="icon-mode-list btn-layout">
                                <i class="w-icon-category"></i>
                            </a>
                        </div>
                    </div>
                </nav>
                <div class="product-wrapper row cols-md-1 cols-xs-2 cols-1">
                    @foreach ($product as $item)
                    <div class="product product-list">
                        <figure class="product-media">
                            <a href="{{ route('product.details', $item->slug) }}">
                                <img src="{{ asset('uploads/product/'.$item->image) }}" alt="{{ $item->name }}" width="330"
                                    height="338" />
                            </a>
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quick View" onclick="quickView({{$item->id}})"></a>
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
                                <a href="#" class="btn-product btn-cart" onclick="addToCard({{$item->id}})" title="Add to Cart"><i
                                        class="w-icon-cart"></i> Add To Cart</a>
                             
                            </div>
                        </div>
                    </div>
                    @endforeach                   
                </div>
                <div class="toolbox toolbox-pagination justify-content-between">
                    <p class="showing-info mb-2 mb-sm-0">
                        {!! $product->links() !!}
                        {{-- Showing<span>1-12 of 60</span>Products --}}
                    </p>
                    <ul class="pagination">
                        <li class="prev disabled">
                            <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                                <i class="w-icon-long-arrow-left"></i>Prev
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="next">
                            <a href="#" aria-label="Next">
                                Next<i class="w-icon-long-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- End of Shop Main Content -->
        </div>
        <!-- End of Shop Content -->
        {{-- <div class="shop-default-brands mb-5">
            <div class="brands-swiper swiper-container swiper-theme "
                data-swiper-options="{
                    'slidesPerView': 2,
                    'breakpoints': {
                        '576': {
                            'slidesPerView': 3
                        },
                        '768': {
                            'slidesPerView': 4
                        },
                        '992': {
                            'slidesPerView': 6
                        },
                        '1200': {
                            'slidesPerView': 7
                        }
                    },
                    'autoplay': {
                        'delay': 4000,
                        'disableOnInteraction': false
                    }
                }">
                <div class="swiper-wrapper row gutter-no cols-xl-7 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/1.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/2.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/3.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/4.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/5.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/6.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                    <div class="swiper-slide">
                        <figure>
                            <img src="assets/images/brands/category/7.png" alt="Brand" width="160" height="90" />
                        </figure>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div> --}}
        <!-- End of Shop Brands-->
    </div>
</div>
<!-- End of Page Content -->
@endsection