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
                        <h4 class="title mb-3">Send Us a Message</h4>
                        <form class="form contact-us-form" action="{{route('contact.Store')}}" method="post">
                            @csrf
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
                    <div class="col-lg-6 mb-8">
                        <h4 class="title mb-3">Our Location</h4>
                        <div class="google-map contact-google-map " id="googlemaps">
                            <iframe  src="{{$content->map}}" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End of Contact Section -->
        </div>

        
        <!-- End Map Section -->
    </div>
    <!-- End of PageContent -->
</main>
<!-- End of Main -->


@endsection
