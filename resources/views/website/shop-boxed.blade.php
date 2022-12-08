@extends('layouts.website')
@section('website-content')
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb bb-no">
            <li><a href="">Home</a></li>
            <li><a href="">Shop</a></li>
            <li>Boxed</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb-nav -->

<div class="page-content mb-10">
    <div class="container">
        <!-- Start of Shop Content -->
        <div class="shop-content row gutter-lg">
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
                                <li><a href="{{ route('shop.box', ['category_filter'=>  $item->slug]) }}">{{ $item->name }}</a></li>
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
                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title"><span>Size</span></h3>
                            <ul class="widget-body filter-items item-check mt-1">
                                @foreach ($size as $item)
                                <li><a href="#">{{ $item->name }}</a></li>
                                @endforeach
                            </ul>
                        </div> --}}
                        <!-- End of Collapsible Widget -->

                    
                   
                        <!-- End of Collapsible Widget -->
                    </div>
                    <!-- End of Sidebar Content -->
                </div>
                <!-- End of Sidebar Content -->
            </aside>
            <!-- End of Shop Sidebar -->

            <!-- Start of Main Content -->
            <div class="main-content">
                <!-- Start of Shop Banner -->
                {{-- <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6 br-xs"
                    style="background-image: url({{ asset('/') }}website/images/shop/banner1.jpg); background-color: #FFC74E;">
                    <div class="banner-content">
                        <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                        <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart
                            Watches</h3>
                        <a href="shop-banner-sidebar.html"
                            class="btn btn-dark btn-rounded btn-icon-right">Discover Now<i
                                class="w-icon-long-arrow-right"></i></a>
                    </div>
                </div> --}}
                <!-- End of Shop Banner -->

                <nav class="toolbox sticky-toolbox sticky-content fix-top">
                    @php
                        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        $urlArray = parse_url( $actual_link);
                        $filterText = parse_str(@$urlArray['query'], $params);
                        @$queryText = $params['shop_view'];
                    @endphp
                    @isset($brandFilter)
                    <div class="toolbox-left">
                        {{-- <div class="toolbox-item toolbox-sort select-box text-dark">
                            <label>Sort By :</label>
                            <select name="orderby" class="form-control">
                                <option value="default" selected="selected">Default sorting</option>
                                <option value="popularity">Sort by popularity</option>
                                <option value="rating">Sort by average rating</option>
                                <option value="date">Sort by latest</option>
                                <option value="price-low">Sort by pric: low to high</option>
                                <option value="price-high">Sort by price: high to low</option>
                            </select>
                        </div> --}}
                        <label>Filtered By :</label>
                        <a class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                            btn-icon-left"><i class="w-icon-sale"></i><span>{{ $brandFilter->name }}</span>
                        </a>
                    </div>
                    @endisset
                    @isset($categoryFilter)
                    <div class="toolbox-left">
                        <label>Showing product by :</label>
                        <a class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                            btn-icon-left"><i class="w-icon-sale"></i><span>{{ $categoryFilter->name }}</span>
                        </a>
                    </div>
                    @endisset
                    @isset($subcategoryFilter)
                    <div class="toolbox-left">
                        <label>Showing product by :</label>
                        <a class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                            btn-icon-left"><i class="w-icon-sale"></i><span>{{ $subcategoryFilter->name }}</span>
                        </a>
                    </div>
                    @endisset
                    @isset($newproductFilter)
                    <div class="toolbox-left">
                        <label>Showing All Products: </label>
                        <a class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                            btn-icon-left"><i class="w-icon-sale"></i><span>New</span>
                        </a>
                    </div>
                    @endisset
                    @isset($offerproductFilter)
                    <div class="toolbox-left">
                        <label>Showing All Products: </label>
                        <a class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                            btn-icon-left"><i class="w-icon-sale"></i><span>Offers</span>
                        </a>
                    </div>
                    @endisset
                    
                    
                    @if(!(isset($categoryFilter) || isset($subcategoryFilter)))
                    <div class="toolbox-right">
                        <div class="toolbox-item toolbox-layout">
                            <a href="{{ route('shop.box', ['shop_view'=>'shop box']) }}" class="icon-mode-grid btn-layout {{ $queryText == 'shop box' ||  $_SERVER['REQUEST_URI'] ? 'active': ''}}">
                                <i class="w-icon-grid"></i>
                            </a>
                            <a href="{{ route('shop.box', ['shop_view'=>'shop list']) }}" class="icon-mode-list btn-layout {{ $queryText == 'shop list' ? 'active': ''}}">
                                <i class="w-icon-list"></i>
                            </a>
                            <a href="{{ route('shop.box', ['shop_view'=>'shop list sidebar']) }}" class="icon-mode-list btn-layout {{ $queryText == 'shop list sidebar' ? 'active': ''}}">
                                <i class="w-icon-category"></i>
                            </a>
                        </div>
                    </div>
                    @endif
                </nav>
               
                <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2">
                    @forelse ($product as $item)
                    <div class="product-wrap">
                        <div class="product text-center">
                            <figure class="product-media">
                                <a href="{{ route('product.details', $item->slug) }}">
                                    <img src="{{ asset('uploads/product/thumbnail/'.$item->thum_image) }}" alt="{{ $item->name }}" width="300"
                                        height="338" />
                                </a>
                                <div class="product-action-horizontal">
                                    {{-- <a href="" class="btn-product-icon btn-cart w-icon-cart" onclick="addToCard({{$item->id}})"
                                        title="Add to cart"></a> --}}
                                    <a href="" class="btn-product-icon btn-quickview w-icon-search"
                                        title="Quick View" onclick="quickView({{$item->id}})"></a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <div class="product-cat">
                                    <a href="#">{{ @$item->category ? $item->category->name : ''}}</a>
                                </div>
                                <h3 class="product-name">
                                    <a href="#">{{ $item->name }}</a>
                                </h3>
                        
                                <div class="product-pa-wrapper">
                                    <div class="product-price">
                                        @if($item->discount && $item->discount != null)
                                        @php
                                            $newPrice = $item->price / 100;
                                            $newPrice = $newPrice * $item->discount;
                                            $newPrice = $item->price - $newPrice;
                                        @endphp
                                        <ins class="new-price">{{ $newPrice  }}TK</ins><del
                                            class="old-price">{{ $item->price }}TK</del>
                                        @else
                                        {{ $item->price }}TK
                                        @endif
                                        
                                    </div>
                                </div>
                                <div>
                                    <a href="#!" class="btn-product btn-cart" title="Add to Cart" onclick="addToCard({{$item->id}})"><i
                                            class="w-icon-cart"></i>&nbsp;Add To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div>
                        No product found
                    </div>
                    @endforelse
                   
                </div>

                <div class="toolbox toolbox-pagination justify-content-between">
                    <p class="showing-info mb-2 mb-sm-0">
                        {{-- Showing<span>1-12 of 60</span>Products --}}
                        {!! $product->links() !!}
                    </p>
                    {{-- <ul class="pagination">
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
                    </ul> --}}
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Shop Content -->
    </div>
</div>
@endsection