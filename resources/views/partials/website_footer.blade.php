<!-- Start of Footer -->
 <footer class="footer appear-animate" data-animation-options="{
    'name': 'fadeIn'
}">
{{-- this is for footer --}}
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="{{route('home')}}" class="logo-footer">
                            <img src="{{ $content->logo }}" alt="logo-footer" width="144"
                                height="45" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">Got Question? Call us 24/7</p>
                            <a href="tel:{{$content->phone_2}}" class="widget-about-call">{{$content->phone_2}}</a>
                            <p class="widget-about-desc">Register now to get updates on pronot get up icons
                                & coupons ster now toon.
                            </p>

                            <div class="social-icons social-icons-colored">
                                <a href="{{$content->facebook}}" target="_blank" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="{{$content->linkedin}}" target="_blank" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="{{$content->instagram}}" target="_blank" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="{{$content->youtube}}" target="_blank" class="social-icon social-youtube w-icon-youtube"></a>
                                {{-- <a href="#" target="_blank" class="social-icon social-pinterest w-icon-pinterest"></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title pt-5">Company</h3>
                        <ul class="widget-body">
                            <li><a href="{{route('about.website')}}">About Us</a></li>
                            <li><a href="{{route('web.contact')}}">Contact Us</a></li>
                            <li><a href="{{ route('shop.box') }}">shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title pt-5">My Account</h4>
                        <ul class="widget-body">
                            <li><a href="{{ route('cart.list') }}">View Cart</a></li>
                            <li><a href="{{route('customer.login')}}">Sign In</a></li>
                            <li><a href="{{ route('customer.signup') }}">Register</a></li>
                
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title pt-5">Customer Service</h4>
                        <ul class="widget-body">
                            {{-- <li><a href="#">Shipping</a></li> --}}
                            <li><a href="{{route('privacy.website')}}">Privacy Policy</a></li>
                            <li><a href="{{route('terms.website')}}">Term and Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright © 2022 All Rights Reserved Pakhir Basa. Developed By - <a href="https://linktechbd.com/" target="_blank">Link Up Technology</a></p>
            </div>
            {{-- <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="{{asset('/')}}website/images/payment.png" alt="payment" width="159" height="25" />
                </figure>
            </div> --}}
        </div>
    </div>
</footer>
<!-- End of Footer -->