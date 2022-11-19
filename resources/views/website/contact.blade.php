@extends('layouts.website')
@section('website-content')
 <!-- Start of Main -->
 <main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Contact Us</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-10 pb-1">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li>Contact Us</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content contact-us">
        <div class="container">
            <section class="content-title-section mb-10">
                <h3 class="title title-center mb-3">Contact
                    Information
                </h3>
                <p class="text-center">Lorem ipsum dolor sit amet,
                    consectetur
                    adipiscing elit, sed do eiusmod tempor incididunt ut</p>
            </section>
            <!-- End of Contact Title Section -->

            <section class="contact-information-section mb-10">
                <div class=" swiper-container swiper-theme " data-swiper-options="{
                    'spaceBetween': 20,
                    'slidesPerView': 1,
                    'breakpoints': {
                        '480': {
                            'slidesPerView': 2
                        },
                        '768': {
                            'slidesPerView': 3
                        },
                        '992': {
                            'slidesPerView': 4
                        }
                    }
                }">
                    <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-email">
                                <i class="w-icon-envelop-closed"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">E-mail Address</h4>
                                <p>{{$content->email}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-headphone">
                                <i class="w-icon-headphone"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Phone Number</h4>
                                <p>{{$content->phone_1}} / {{$content->phone_2}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Address</h4>
                                <p>{{$content->address}}</p>
                            </div>
                        </div>
                        <div class="swiper-slide icon-box text-center icon-box-primary">
                            <span class="icon-box-icon icon-fax">
                                <i class="w-icon-fax"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title">Fax</h4>
                                <p>{{$content->phone_1}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Information section -->

            <hr class="divider mb-10 pb-1">

            <section class="contact-section">
                <div class="row gutter-lg pb-3">
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">People usually ask these</h4>
                        <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse1" class="collapse">How can I cancel my order?</a>
                                </div>
                                <div id="collapse1" class="card-body expanded">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse2" class="expand">Why is my registration delayed?</a>
                                </div>
                                <div id="collapse2" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse3" class="expand">What do I need to buy products?</a>
                                </div>
                                <div id="collapse3" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse4" class="expand">How can I track an order?</a>
                                </div>
                                <div id="collapse4" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod temp orincid 
                                        idunt ut labore et dolore magna aliqua. Venenatis tellus in metus vulp utate eu sceler 
                                        isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a href="#collapse5" class="expand">How can I get money back?</a>
                                </div>
                                <div id="collapse5" class="card-body collapsed">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                        temp orincid idunt ut labore et dolore magna aliqua. Venenatis tellus in
                                        metus vulp utate eu sceler isque felis. Vel pretium.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">Send Us a Message</h4>
                        <form class="form contact-us-form" action="{{route('contact.Store')}}" method="post">
                            <div class="form-group">
                                <label for="sender_name">Your Name</label>
                                <input type="text" id="username" name="sender_name"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Your Email</label>
                                <input type="email" id="email" name="email"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Your Phone</label>
                                <input type="text" id="phone" name="phone"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="subject">Your Subject</label>
                                <input type="text" id="subject" name="subject"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Your Message</label>
                                <textarea id="message" name="message" cols="30" rows="3"
                                    class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                        </form>
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
        <div class="google-map contact-google-map" id="googlemaps"></div>
        <!-- End Map Section -->
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->


{{-- <section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 p-3">
                <div class="getInTouch">
                    <h3 class="text-success pb-3">Get In Touch</h3>
                    <form action="{{route('contact.Store')}}" method="post">
                        @csrf
                        <div class="d-flex">
                            <input type="text" name="sender_name" placeholder="Name *" required class="w-50 me-3 form-control">
                             <input type="text" name="phone" placeholder="Phone *" required class="w-50 form-control">
                        </div>
                        <div class="d-flex py-3">
                            <input type="email" name="email" placeholder="Email" class="w-50 me-3 form-control">
                             <input type="text" name="subject" placeholder="Subject" class="w-50  form-control">
                        </div>
                        <div class="d-flex">
                            <textarea  rows="5" name="message" class="form-control" placeholder="Your Message"></textarea>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-success" >Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-12 p-3">
                <div class="getInTouch">
                    <h3 class="text-success pb-3">Contact Us</h3>
                    {!!$content->about_description!!}
                    <ul class="fa-ul py-3">
                        <li><i class="fa-li fas fa-fax text-success"></i>{{$content->address}}</li>
                        <li><i class="fa-li fas fa-phone text-success"></i>{{$content->phone_1}}</li>
                        <li><i class="fa-li fas fa-phone text-success"></i>{{$content->phone_2}}</li>
                        <li><i class="fa-li fas fa-envelope text-success"></i>{{$content->email}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> --}}

@endsection
