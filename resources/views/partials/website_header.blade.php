<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg">Welcome to Pakhir Basa Store message or remove it!</p>
            </div>
            <div class="header-right">
               
                <!-- End of DropDown Menu -->

                <!-- End of Dropdown Menu -->
                <!-- <span class="divider d-lg-show"></span> -->
                <a href="my-account.html" class="d-lg-show">My Account</a>
                <a href="{{route('customer.login')}}" class="d-lg-show login sign-in"><i
                        class="w-icon-account"></i>Sign In</a>
                <span class="delimiter d-lg-show">/</span>
                <a href="website/ajax/login.html" class="ml-0 d-lg-show login register">Register</a>
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
                    <img src="website/images/pakhir_basa_logo-removebg.png" alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="#"
                    class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <option value="4">Fashion</option>
                            <option value="5">Furniture</option>
                            <option value="6">Shoes</option>
                            <option value="7">Sports</option>
                            <option value="8">Games</option>
                            <option value="9">Computers</option>
                            <option value="10">Electronics</option>
                            <option value="11">Kitchen</option>
                            <option value="12">Clothing</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" id="search" placeholder="Search in..."
                        required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:" class="text-capitalize">Live Chat</a> or :</h4>
                        <a href="tel:{{$content->phone_1}}" class="phone-number font-weight-bolder ls-50">{{$content->phone_1}}</a>
                    </div>
                </div>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="#" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">2</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="products">
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">Beige knitted
                                        elas<br>tic
                                        runner shoes</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$25.68</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="website/images/cart/product-1.jpg" alt="product" height="84"
                                            width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">Blue utility
                                        pina<br>fore
                                        denim dress</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$32.99</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="website/images/cart/product-2.jpg" alt="product" width="84"
                                            height="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">$58.67</span>
                        </div>

                        <div class="cart-action">
                            <a href="" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="{{route('checkout.user')}}" class="btn btn-primary  btn-rounded">Checkout</a>
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
                        <a href="#" class="category-toggle text-dark" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-tshirt2"></i>Fashion
                                    </a>
                                    <ul class="megamenu">
                                        <li>
                                            <h4 class="menu-title">Women</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">New Arrivals</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Best Sellers</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Trending</a></li>
                                                <li><a href="{{route('shop.banner')}}">Clothing</a></li>
                                                <li><a href="{{route('shop.banner')}}">Shoes</a></li>
                                                <li><a href="{{route('shop.banner')}}">Bags</a></li>
                                                <li><a href="{{route('shop.banner')}}">Accessories</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Jewlery &
                                                        Watches</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4 class="menu-title">Men</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">New Arrivals</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Best Sellers</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Trending</a></li>
                                                <li><a href="{{route('shop.banner')}}">Clothing</a></li>
                                                <li><a href="{{route('shop.banner')}}">Shoes</a></li>
                                                <li><a href="{{route('shop.banner')}}">Bags</a></li>
                                                <li><a href="{{route('shop.banner')}}">Accessories</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Jewlery &
                                                        Watches</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="banner-fixed menu-banner menu-banner2">
                                                <figure>
                                                    <img src="website/images/menu/banner-2.jpg" alt="Menu Banner"
                                                        width="235" height="347" />
                                                </figure>
                                                <div class="banner-content">
                                                    <div class="banner-price-info mb-1 ls-normal">Get up to
                                                        <strong
                                                            class="text-primary text-uppercase">20%Off</strong>
                                                    </div>
                                                    <h3 class="banner-title ls-normal">Hot Sales</h3>
                                                    <a href="shop-banner-sidebar.html"
                                                        class="btn btn-dark btn-sm btn-link btn-slide-right btn-icon-right">
                                                        Shop Now<i class="w-icon-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-home"></i>Home & Garden
                                    </a>
                                    <ul class="megamenu">
                                        <li>
                                            <h4 class="menu-title">Bedroom</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Beds, Frames &
                                                        Bases</a></li>
                                                <li><a href="{{route('shop.banner')}}">Dressers</a></li>
                                                <li><a href="{{route('shop.banner')}}">Nightstands</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Kid's Beds &
                                                        Headboards</a></li>
                                                <li><a href="{{route('shop.banner')}}">Armoires</a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">Living Room</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Coffee Tables</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Chairs</a></li>
                                                <li><a href="{{route('shop.banner')}}">Tables</a></li>
                                                <li><a href="{{route('shop.banner')}}">Futons & Sofa
                                                        Beds</a></li>
                                                <li><a href="{{route('shop.banner')}}">Cabinets &
                                                        Chests</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4 class="menu-title">Office</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Office Chairs</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Desks</a></li>
                                                <li><a href="{{route('shop.banner')}}">Bookcases</a></li>
                                                <li><a href="{{route('shop.banner')}}">File Cabinets</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Breakroom
                                                        Tables</a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">Kitchen & Dining</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Dining Sets</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Kitchen Storage
                                                        Cabinets</a></li>
                                                <li><a href="{{route('shop.banner')}}">Bashers Racks</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Dining Chairs</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Dining Room
                                                        Tables</a></li>
                                                <li><a href="{{route('shop.banner')}}">Bar Stools</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="menu-banner banner-fixed menu-banner3">
                                                <figure>
                                                    <img src="website/images/menu/banner-3.jpg" alt="Menu Banner"
                                                        width="235" height="461" />
                                                </figure>
                                                <div class="banner-content">
                                                    <h4
                                                        class="banner-subtitle font-weight-normal text-white mb-1">
                                                        Restroom</h4>
                                                    <h3
                                                        class="banner-title font-weight-bolder text-white ls-normal">
                                                        Furniture Sale</h3>
                                                    <div
                                                        class="banner-price-info text-white font-weight-normal ls-25">
                                                        Up to <span
                                                            class="text-secondary text-uppercase font-weight-bold">25%
                                                            Off</span></div>
                                                    <a href="shop-banner-sidebar.html"
                                                        class="btn btn-white btn-link btn-sm btn-slide-right btn-icon-right">
                                                        Shop Now<i class="w-icon-long-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-electronics"></i>Electronics
                                    </a>
                                    <ul class="megamenu">
                                        <li>
                                            <h4 class="menu-title">Laptops &amp; Computers</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Desktop
                                                        Computers</a></li>
                                                <li><a href="{{route('shop.banner')}}">Monitors</a></li>
                                                <li><a href="{{route('shop.banner')}}">Laptops</a></li>
                                                <li><a href="{{route('shop.banner')}}">Hard Drives &amp;
                                                        Storage</a></li>
                                                <li><a href="{{route('shop.banner')}}">Computer
                                                        Accessories</a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">TV &amp; Video</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">TVs</a></li>
                                                <li><a href="{{route('shop.banner')}}">Home Audio
                                                        Speakers</a></li>
                                                <li><a href="{{route('shop.banner')}}">Projectors</a></li>
                                                <li><a href="{{route('shop.banner')}}">Media Streaming
                                                        Devices</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <h4 class="menu-title">Digital Cameras</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Digital SLR
                                                        Cameras</a></li>
                                                <li><a href="{{route('shop.banner')}}">Sports & Action
                                                        Cameras</a></li>
                                                <li><a href="{{route('shop.banner')}}">Camera Lenses</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Photo Printer</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Digital Memory
                                                        Cards</a></li>
                                            </ul>

                                            <h4 class="menu-title mt-1">Cell Phones</h4>
                                            <hr class="divider">
                                            <ul>
                                                <li><a href="{{route('shop.banner')}}">Carrier Phones</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Unlocked Phones</a>
                                                </li>
                                                <li><a href="{{route('shop.banner')}}">Phone & Cellphone
                                                        Cases</a></li>
                                                <li><a href="{{route('shop.banner')}}">Cellphone
                                                        Chargers</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <div class="menu-banner banner-fixed menu-banner4">
                                                <figure>
                                                    <img src="website/images/menu/banner-4.jpg" alt="Menu Banner"
                                                        width="235" height="433" />
                                                </figure>
                                                <div class="banner-content">
                                                    <h4 class="banner-subtitle font-weight-normal">Deals Of The
                                                        Week</h4>
                                                    <h3 class="banner-title text-white">Save On Smart EarPhone
                                                    </h3>
                                                    <div
                                                        class="banner-price-info text-secondary font-weight-bolder text-uppercase text-secondary">
                                                        20% Off</div>
                                                    <a href="shop-banner-sidebar.html"
                                                        class="btn btn-white btn-outline btn-sm btn-rounded">Shop
                                                        Now</a>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-furniture"></i>Furniture
                                    </a>
                                    <ul class="megamenu type2">
                                        <li class="row">
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">Furniture</h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="{{route('shop.banner')}}">Sofas & Couches</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Armchairs</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Bed Frames</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Beside Tables</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Dressing Tables</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">Lighting</h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="{{route('shop.banner')}}">Light Bulbs</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Lamps</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Celling Lights</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Wall Lights</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Bathroom
                                                            Lighting</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">Home Accessories</h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="{{route('shop.banner')}}">Decorative
                                                            Accessories</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Candals &
                                                            Holders</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Home Fragrance</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Mirrors</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Clocks</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-6">
                                                <h4 class="menu-title">Garden & Outdoors</h4>
                                                <hr class="divider" />
                                                <ul>
                                                    <li><a href="{{route('shop.banner')}}">Garden
                                                            Furniture</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Lawn Mowers</a>
                                                    </li>
                                                    <li><a href="{{route('shop.banner')}}">Pressure
                                                            Washers</a></li>
                                                    <li><a href="{{route('shop.banner')}}">All Garden
                                                            Tools</a></li>
                                                    <li><a href="{{route('shop.banner')}}">Outdoor Dining</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-6">
                                                <div class="banner banner-fixed menu-banner5 br-xs">
                                                    <figure>
                                                        <img src="website/images/menu/banner-5.jpg" alt="Banner"
                                                            width="410" height="123"
                                                            style="background-color: #D2D2D2;" />
                                                    </figure>
                                                    <div class="banner-content text-right y-50">
                                                        <h4
                                                            class="banner-subtitle font-weight-normal text-default text-capitalize">
                                                            New Arrivals</h4>
                                                        <h3
                                                            class="banner-title font-weight-bolder text-capitalize ls-normal">
                                                            Amazing Sofa</h3>
                                                        <div
                                                            class="banner-price-info font-weight-normal ls-normal">
                                                            Starting at <strong>$125.00</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="banner banner-fixed menu-banner5 br-xs">
                                                    <figure>
                                                        <img src="website/images/menu/banner-6.jpg" alt="Banner"
                                                            width="410" height="123"
                                                            style="background-color: #9F9888;" />
                                                    </figure>
                                                    <div class="banner-content y-50">
                                                        <h4
                                                            class="banner-subtitle font-weight-normal text-white text-capitalize">
                                                            Best Seller</h4>
                                                        <h3
                                                            class="banner-title font-weight-bolder text-capitalize text-white ls-normal">
                                                            Chair &amp; Lamp</h3>
                                                        <div
                                                            class="banner-price-info font-weight-normal ls-normal text-white">
                                                            From <strong>$165.00</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-heartbeat"></i>Healthy & Beauty
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-gift"></i>Gift Ideas
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-gamepad"></i>Toy & Games
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-ice-cream"></i>Cooking
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-ios"></i>Smart Phones
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-camera"></i>Cameras & Photo
                                    </a>
                                </li>
                                <li>
                                    <a href="{{route('shop.banner')}}">
                                        <i class="w-icon-ruby"></i>Accessories
                                    </a>
                                </li>
                                <li>
                                    <a href="shop-banner-sidebar.html"
                                        class="font-weight-bold text-primary text-uppercase ls-25">
                                        View All Categories<i class="w-icon-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li class="active">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('shop.box') }}">Shop</a>
                            </li>
                            <li>
                                <a href="{{route('about.website')}}">Pages</a>
                                <ul>

                                    <li><a href="{{route('about.website')}}">About Us</a></li>
                                    <li><a href="{{route('about.website')}}">Privacy Policy</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="{{route('web.contact')}}">Contact Us</a>
                              
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                </div>
            </div>
        </div>
    </div>
</header>