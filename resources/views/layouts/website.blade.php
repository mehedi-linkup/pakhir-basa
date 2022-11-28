<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ $content->company_name }}</title>
    <meta name="keywords" content="Pakhir Basa Theme" />
    <meta name="description" content="Pakhir Basa Ecommerce Site">
    <meta name="author" content="Mehedi Hasan">
    <link rel="icon" type="image/png" href="{{ $content->logo }}" />
    <script>
        WebFontConfig = {
            google: { families: ['Poppins:400,500,600,700,800'] }
        };
        (function (d) {
            var wf = d.createElement('script'), s = d.scripts[0];
            wf.src = '{{ asset('/') }}website/assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>
    <link rel="preload" href="{{ asset('/') }}website/vendor/fontawesome-free/webfonts/fa-regular-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('/') }}website/vendor/fontawesome-free/webfonts/fa-solid-900.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('/') }}website/vendor/fontawesome-free/webfonts/fa-brands-400.woff2" as="font" type="font/woff2"
        crossorigin="anonymous">
    <link rel="preload" href="{{ asset('/') }}website/assets/fonts/wolmart87d5.woff?png09e" as="font" type="font/woff" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}website/vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}website/vendor/animate/animate.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('/') }}website/vendor/magnific-popup/magnific-popup.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}website/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('website/vendor/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{asset('/')}}website/vendor/photoswipe/photoswipe.min.css">
     <!-- Default CSS -->
     <link rel="stylesheet" type="text/css" href="{{ asset('/') }}website/assets/css/style.min.css">
     <link rel="stylesheet" type="text/css" href="{{ asset('/') }}website/assets/css/custom.css">
    @yield('website-css')
</head>
<body class="home">
    <div class="page-wrapper">
        <h1 class="d-none">Pakhir Basa </h1>
        <!-- Start of Header -->
        @include('partials.website_header')
        <!--End  Header Section -->

        <!-- Start of Main-->
        <main class="main">
            @yield('website-content')
        </main>
        <!-- End of Main -->

        <!-- Start Footer Section -->
        @include('partials.website_footer')
        <!-- End of Footer -->
    </div>
     <!-- End of Page-wrapper-->

    <!-- Start of Sticky Footer -->
     <div class="sticky-footer sticky-content fix-bottom">
        <a href="" class="sticky-link active">
            <i class="w-icon-home"></i>
            <p>Home</p>
        </a>
        <a href="shop-banner-sidebar.html" class="sticky-link">
            <i class="w-icon-category"></i>
            <p>Shop</p>
        </a>
        <a href="my-account.html" class="sticky-link">
            <i class="w-icon-account"></i>
            <p>Account</p>
        </a>
        <div class="cart-dropdown dir-up">
            <a href="cart.html" class="sticky-link">
                <i class="w-icon-cart"></i>
                <p>Cart</p>
            </a>
            <div class="dropdown-box">
                <div class="products">
                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Beige knitted elas<br>tic
                                    runner shoes</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$25.68</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/cart/product-1.jpg" alt="product" height="84" width="94" />
                            </a>
                        </figure>
                        <button class="btn btn-link btn-close" aria-label="button">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <div class="product product-cart">
                        <div class="product-detail">
                            <h3 class="product-name">
                                <a href="product-default.html">Blue utility pina<br>fore
                                    denim dress</a>
                            </h3>
                            <div class="price-box">
                                <span class="product-quantity">1</span>
                                <span class="product-price">$32.99</span>
                            </div>
                        </div>
                        <figure class="product-media">
                            <a href="product-default.html">
                                <img src="assets/images/cart/product-2.jpg" alt="product" width="84" height="94" />
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
                    <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                    <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                </div>
            </div>
            <!-- End of Dropdown Box -->
        </div>

        <div class="header-search hs-toggle dir-up">
            <a href="#" class="search-toggle sticky-link">
                <i class="w-icon-search"></i>
                <p>Search</p>
            </a>
            <form action="#" class="input-wrapper">
                <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                    required />
                <button class="btn btn-search" type="submit">
                    <i class="w-icon-search"></i>
                </button>
            </form>
        </div>
    </div>
    <!-- End of Sticky Footer -->

    <!-- Start of Scroll Top -->
    <a id="scroll-top" class="scroll-top" href="#top" title="Top" role="button"> <i class="w-icon-angle-up"></i> <svg
            version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 70">
            <circle id="progress-indicator" fill="transparent" stroke="#000000" stroke-miterlimit="10" cx="35" cy="35"
                r="34" style="stroke-dasharray: 16.4198, 400;"></circle>
        </svg>
    </a>
    <!-- End of Scroll Top -->

    

    <!-- Start of Quick View -->
    <div class="product product-single product-popup">
        <div class="row gutter-lg">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="product-gallery product-gallery-sticky">
                    <div class="swiper-container product-single-swiper swiper-theme nav-inner">
                        <div id="quickview-swiper-wraper" class="swiper-wrapper row cols-1 gutter-no">
                            {{-- <div class="swiper-slide">
                                <figure class="product-image">
                                    <img src="{{ asset('/') }}website/images/products/popup/1-440x494.jpg"
                                        data-zoom-image="{{ asset('/') }}website/images/products/popup/1-800x900.jpg"
                                        alt="Water Boil Black Utensil" width="800" height="900">
                                </figure>
                            </div> --}}
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                    <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                        'navigation': {
                            'nextEl': '.swiper-button-next',
                            'prevEl': '.swiper-button-prev'
                        }
                    }">
                        <div id="quickviewProductThumb" class="product-thumbs swiper-wrapper row cols-4 gutter-sm">
                            {{-- <div class="product-thumb swiper-slide">
                                <img src="{{ asset('/') }}website/images/products/popup/1-103x116.jpg" alt="Product Thumb" width="103"
                                    height="116">
                            </div> --}}
                        </div>
                        <button class="swiper-button-next"></button>
                        <button class="swiper-button-prev"></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 overflow-hidden p-relative">
                <div class="product-details scrollable pl-0">
                    <h2 id="productTitle" class="product-title"></h2>
                    <div class="product-bm-wrapper">
                        <figure class="brand">
                            <img src="{{ asset('/') }}website/images/products/brand/brand-1.jpg" alt="Brand" width="102" height="48" />
                        </figure>
                        <div class="product-meta">
                            <div class="product-categories">
                                Category:
                                <span id="productCategory" class="product-category"><a href="#"></a></span>
                            </div>
                            <div class="product-sku">
                                Product Code: <span id="productCode"></span>
                            </div>
                        </div>
                    </div>

                    <hr class="product-divider">

                    <div id="productPrice" class="product-price"></div>

                    {{-- <div class="ratings-container">
                        <div class="ratings-full">
                            <span class="ratings" style="width: 80%;"></span>
                            <span class="tooltiptext tooltip-top"></span>
                        </div>
                        <a href="#" class="rating-reviews">(3 Reviews)</a>
                    </div> --}}

                    <div id="productShortDesc" class="product-short-desc">
                        {{-- <ul class="list-type-check list-style-none">
                            <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                            <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                            <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                        </ul> --}}
                    </div>

                    <hr class="product-divider">

                    {{-- <div class="product-form product-variation-form product-size-swatch">
                        <label>Color:</label>
                        <div id="colorName" class="d-flex align-items-center product-variations">
                            <a href="#" class="color" style="background-color: #ffcc01"></a>
                            <a href="#" class="color" style="background-color: #ca6d00;"></a>
                            <a href="#" class="color" style="background-color: #1c93cb;"></a>
                            <a href="#" class="color" style="background-color: #ccc;"></a>
                            <a href="#" class="color" style="background-color: #333;"></a>
                        </div>
                    </div> --}}
                    <div class="product-form product-variation-form product-size-swatch">
                        <label class="mb-1">Size:</label>
                        <div id="sizeName" class="flex-wrap d-flex align-items-center product-variations">
                            {{-- <a href="#" class="size">Small</a>
                            <a href="#" class="size">Medium</a>
                            <a href="#" class="size">Large</a>
                            <a href="#" class="size">Extra Large</a> --}}
                        </div>
                        {{-- <a href="#" class="product-variation-clean">Clean All</a> --}}
                    </div>

                    {{-- <div class="product-variation-price">
                        <span></span>
                    </div> --}}

                    <div class="product-form">
                        <div class="product-qty-form">
                            <div class="input-group">
                                <input id="quantityId" class="quantity form-control" type="number" min="1" max="10000000">
                                <button class="quantity-plus w-icon-plus"></button>
                                <button class="quantity-minus w-icon-minus"></button>
                            </div>
                        </div>
                        <button id="QuickaddToCart" class="btn btn-primary btn-cart" onclick="">
                            <i class="w-icon-cart"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->

    <!-- Plugin JS File -->
    <script src="{{asset('/')}}website/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('/')}}website/vendor/jquery.plugin/jquery.plugin.min.js"></script>
    <script src="{{asset('/')}}website/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="{{asset('/')}}website/vendor/jquery.countdown/jquery.countdown.min.js"></script>
    <script src="{{asset('/')}}website/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="{{asset('/')}}website/vendor/skrollr/skrollr.min.js"></script>
    <script src="{{ asset('website/vendor/toastr/toastr.min.js') }}"></script>
    
    <!-- Swiper JS -->
    <script src="{{asset('/')}}website/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="{{asset('website/vendor/zoom/jquery.zoom.js')}}"></script>
    <script src="{{asset('website/vendor/photoswipe/photoswipe.min.js')}}"></script>
    <script src="{{asset('website/vendor/photoswipe/photoswipe-ui-default.min.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('/')}}website/assets/js/main.js"></script>
    @stack('website-js')
    <script>
        @if(Session::has('update'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('update') }}");
        @endif

        @if(Session::has('remove'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.warning("{{ session('remove') }}");
        @endif

        @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.info("{{ session('message') }}");
        @endif

        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('success') }}");
        @endif
        
        @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ session('error') }}");
        @endif
    </script>
    <script src="{{ asset('website/vendor/bootstrap3-typeahead.min.js') }}"></script>
    <script>
        var baseUri = "{{ url('/') }}";
        $('.keyword').typeahead({
            minLength: 1,
            source: function (keyword, process) {
                let catId = $('#category').val();
                return $.get(`${baseUri}/get_suggestions/${keyword}/${catId}`, function (data) {
                    return process(data);
                });
            },
  
            updater:function (item) {
                $(location).attr('href', '/search?q='+item);
                return item;
            }
  
        });
    </script>
    <script>    
        function quickView(id){
            $.ajax({
                type: "GET",
                url: "product/quickview/"+id,
                dataType: "json",
                success: function(data) {
                    $('#productTitle').text(data.product.name);
                    $('#productCategory').text(data.product.category.name);
                    $('#productCode').text(data.product.code);
                    //product price
                    if(data.product.discount) {
                        let original_price = data.product.price;
                        let discount = data.product.discount;
                        let new_price = data.product.price - ((data.product.price / 100) * discount);
                        $('#productPrice').text(new_price);
                    } else {
                        $('#productPrice').text(data.product.price);
                    }
                    $('#productShortDesc').html(data.product.short_details);
                    // Color 
                    let colorText = "";
                    $.each(data.color, function(key, value) {
                        colorText += '<a href="#" class="size" style="background-color: #ffcc01">' + value.name +'</a>';
                    });
                    $('#colorName').html(colorText);
                   
                    let sizeText = "";
                    $.each(data.size, function(key, value) {
                        sizeText += '<a href="#" class="size">'+ value.name +'</a>';                           
                    });
                    $('#sizeName').html(sizeText);

                    $('#QuickaddToCart').attr("onclick","addToCard("+ id +")");
                    console.log(data.product.product_image.length);
                    // if(data.product.product_image.length > 0) {
                        let slideImage = "";
                        if(data.product.product_image.length > 0) {
                            $.each(data.product.product_image, function(key, value) {
                                slideImage += '<div class="swiper-slide"><figure class="product-image"><img src="'+ window.location.origin +'/uploads/otherImage/' + value.otherImage +'" data-zoom-image="'+ window.location.origin+'/uploads/otherImage/'+value.otherImage+'" alt="Image Name" width="800" height="900"></figure></div>'
                            })
                        } else {
                            slideImage += '<div class="swiper-slide"><figure class="product-image"><img src="'+ window.location.origin +'/uploads/product/thumbnail/' + data.product.thum_image +'" data-zoom-image="'+ window.location.origin+'/uploads/product/thumbnail/'+data.product.thum_image+'" alt="Image Name" width="800" height="900"></figure></div>'
                        }

                        $('#quickview-swiper-wraper').html(slideImage);

                        let sliderThumb = "";
                        if(data.product.product_image.length > 0) {
                            $.each(data.product.product_image, function(key, value) {
                                sliderThumb += '<div class="product-thumb swiper-slide"><img src="'+ window.location.origin +'/uploads/otherImage/' + value.otherImage +'" alt="Product Thumb" width="103" height="116"></div>';
                            })
                        } else {
                            sliderThumb += '<div class="product-thumb swiper-slide"><img src="'+ window.location.origin +'/uploads/product/thumbnail/' + data.product.thum_image +'" alt="Product Thumb" width="103" height="116"></div>';
                        }
                        $('#quickviewProductThumb').html(sliderThumb);
                        Wolmart.slider(".swiper-container")
                        Wolmart.call(Wolmart.slider.pgToggle)
                        Wolmart.$window.on("resize", function () {
                            Wolmart.call(Wolmart.slider.pgToggle);
                        });
                    // }
                }
            });
        }
        function updateCart(id) {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            let url = "/update-cart-ajax";
            $.ajax({
                url: url,
                type: "post",
                data: {
                    _token: CSRF_TOKEN,
                    id: id,
                    quantity: $('#quantityId').val()
                },
                dataType: "json", 
                success: function(res) {
                    console.log(res);
                }
            })
        }
    </script>
    <script>
         function addToCard(id) {
            var url = "/cart-add/"+id;
            $.ajax({
                url: url,
                type: "get",
                dataType: "json",
                success:function(res) {
                    cartAllData();
                }
            })
        }
        // ajax card delete
        function deleteCard(id) {
        var url = "/remove/"+id;
        $.ajax({
            url:url,
            type:"get",
            dataType: "json",
                success:function(res) {
                    cartAllData();
                }
            })
        }

        function cartAllData() {
            // var cartSubtotal = $('#cartSubtotal').val();
        
            $.ajax({
                url:"{{route('cart.alldata')}}",
                type:"get",
                dataType: "json",
                success:function(res) {
                    var data = "";
                    $.each(res, function(key, value) {
                        console.log(value)
                        data = data + '<div class="product product-cart"><div class="product-detail"><a href="" class="product-name">'+value.name+'</a><div class="price-box"><span class="product-quantity">'+value.quantity+'</span><span class="product-price">'+value.price+'TK</span></div></div><figure class="product-media"><a href=""><img src="'+ location.origin +'/uploads/product/thumbnail/'+value.attributes.image+'" alt="'+value.attributes.slug+'" height="84" width="94" /></a></figure><button class="btn btn-link btn-close" onclick="deleteCard('+value.id+')" aria-label="button"><i class="fas fa-times"></i></button></div>'
                    })
                    $('#productCartList').html(data);
                    cartcontent();
                }
            })
        }
        function cartcontent() {
           $.ajax({
            url:"{{route('cart.content')}}",
                type:"get",
                dataType: "json",
                success:function(res) {
                    $('#cart-count').text(res.total_item);
                    $('#cartSubtotal').text(res.total_amount+'TK');
                }
           })
          }

    </script>
    <script>
        // Add active class to the current button (highlight it)
        var header = document.getElementById("toolbox");
        var btns = header.getElementsByClassName("btn-layout");
        for (var i = 0; i < btns.length; i++) {
          btns[i].addEventListener("click", function() {
          var current = document.getElementsByClassName("active");
          current[0].className = current[0].className.replace(" active", "");
          this.className += " active";
          });
        }
        </script>
</body>

</html>
