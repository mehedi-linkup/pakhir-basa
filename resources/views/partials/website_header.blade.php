<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to Pakhir Basa Store</p>
            </div>
            <div class="header-right">
               
                <!-- End of DropDown Menu -->

                <!-- End of Dropdown Menu -->
                <!-- <span class="divider d-lg-show"></span> -->
                @if(Auth::guard('customer')->user())
                <a href="{{ route('customer.panel') }}" class="d-lg-show">My Account</a>
                @else
                <a href="{{ route('customer.login') }}" class="d-lg-show login sign-in"><i
                        class="w-icon-account"></i>Sign In</a>
                <span class="delimiter d-lg-show">/</span>
                <a href="{{ route('customer.signup') }}" class="ml-0 d-lg-show login register">Register</a>
                @endif
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{route('home')}}" class="logo ml-lg-0">
                    <img src="{{ asset($content->logo) }}" alt="logo" width="auto" style="width:150px; height:100px" />
                </a>
                <form method="get" action="{{ route('search') }}"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="" label="All Categories"></option>
                            @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <input type="search" name="q"
                            class="form-control search-box keyword" id="keyword"
                            autocomplete="off" placeholder="search products...">
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:" class="text-capitalize">Call </a> Us :</h4>
                        <a href="tel:{{$content->phone_1}}" class="phone-number font-weight-bolder ls-50">{{$content->phone_1}}</a>
                    </div>
                </div>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span id="cart-count" class="cart-count">{{ \Cart::getContent()->count(); }}</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>
                        <div id="productCartList" class="products">
                            @php
                                $cartAll = \Cart::getContent();
                            @endphp
                            @foreach ($cartAll as $item)
                                <div class="product product-cart">
                                    <div class="product-detail">
                                        <a href="#" class="product-name">{{ $item->name }}</a>
                                        <div class="price-box">
                                            <span class="product-quantity">{{ $item->quantity }}</span>
                                            <span class="product-price">{{ $item->price }}TK</span>
                                        </div>
                                    </div>
                                    <figure class="product-media">
                                        <a href="#">
                                            <img src="{{ asset('uploads/product/thumbnail/'.$item->attributes->image) }}" alt="{{ $item->attributes->slug }}" height="84"
                                                width="94" />
                                        </a>
                                    </figure>
                                    <button class="btn btn-link btn-close" onclick="deleteCard({{$item->id}})" aria-label="button">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span id="cartSubtotal" class="price">{{ \Cart::getTotal() }}TK</span>
                        </div>

                        <div class="cart-action">
                            <a href="{{ route('cart.list') }}" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="{{route('checkout.index')}}" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle " role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>
                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                @foreach ($category as $item)
                                <li>
                                    <a href="{{route('categoryWise.list',$item->id)}}">{{ $item->name }} </a>
                                    @if(count($item->SubCategory) > 0)
                                    <ul class="megamenu">
                                        <li>
                                            @foreach ($item->SubCategory as $item1)
                                            <a class="menu-title " href="{{route('SubCategoryWise.list', $item1->id)}}">{{ $item1->name }}</a>
                                            <hr class="divider mb-1">
                                            @php
                                               $childcategory = \App\Models\ChildCategory::where('subcategory_id', $item1->id)->get();
                                            @endphp
                                            @if(count($childcategory) > 0)
                                            <ul>
                                                @foreach ($childcategory as $item2)
                                                <li><a href="{{route('shop.banner')}}">{{ $item2->name }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                            @endforeach
                                        </li>                                   
                                    </ul> 
                                    @endif
                                </li> 
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li class="{{ (request()->is('shop')) ? 'active' : '' }}">
                                <a href="{{ route('shop.box') }}">Shop</a>
                            </li>
                            <li class="{{ (request()->is('about-us')) ? 'active' : '' }}">
                                <a href="{{route('about.website')}}">About Us</a>
                                <ul>

                                    <li><a href="{{route('privacy.website')}}">Privacy Policy </a></li>
                                    <li><a href="{{route('terms.website')}}">Terms & Condition</a></li>
                                </ul>
                            </li>
                            <li class="{{ (request()->is('contact')) ? 'active' : '' }}">
                                <a href="{{route('web.contact')}}">Contact Us</a>
                              
                            </li>
                        </ul>
                    </nav>
                </div>
                {{-- <div class="header-right">
                    <a href="{{route('track.order')}}" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                </div> --}}
            </div>
        </div>
    </div>
</header>




<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
                <li class="nav-item">
                    <a href="#categories" class="nav-link">Categories</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>
                        <a href="{{ route('shop.box') }}">Shop</a>
                    </li>
                    <li class="">
                        <a href="{{route('about.website')}}">About Us</a>
                        <ul>

                            <li><a href="{{route('privacy.website')}}">Privacy Policy </a></li>
                            <li><a href="{{route('terms.website')}}">Terms & Condition</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('web.contact')}}">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    @foreach ($category as $item)
                                <li>
                                    <a href="{{route('categoryWise.list',$item->id)}}">{{ $item->name }} </a>
                                    @if(count($item->SubCategory) > 0)
                                    <ul class="megamenu">
                                        @foreach ($item->SubCategory as $item1)
                                        <li>
                                            <a class="menu-title" href="#">{{ $item1->name }}</a>
                                            <hr class="divider">
                                            @php
                                               $childcategory = \App\Models\ChildCategory::where('subcategory_id', $item1->id)->get();
                                            @endphp
                                            @if(count($childcategory) > 0)
                                            <ul>
                                                @foreach ($childcategory as $item2)
                                                <li><a href="{{route('shop.banner')}}">{{ $item2->name }}</a></li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                   
                                        @endforeach
                                    </ul> 
                                    @endif
                                </li> 
                                @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->