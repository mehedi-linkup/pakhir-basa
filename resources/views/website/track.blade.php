@extends('layouts.website')
@section('website-content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Track Order</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav  pb-8">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Track Order</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="row content-layout-wrapper align-items-start">
                    <div data-elementor-type="wp-page" data-elementor-id="10388" class="elementor elementor-10388">
                        <section class="wd-negative-gap elementor-section elementor-top-section elementor-element elementor-element-572365f elementor-section-boxed elementor-section-height-default elementor-section-height-default wd-section-disabled"
                            data-id="572365f" data-element_type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-e0762ab"
                                    data-id="e0762ab" data-element_type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-e7695ca elementor-widget elementor-widget-shortcode"
                                            data-id="e7695ca" data-element_type="widget"
                                            data-widget_type="shortcode.default">
                                            <div class="elementor-widget-container">
                                                <div class="elementor-shortcode">
                                                    <div class="woocommerce">
                                                        <form action="" method="post" class="woocommerce-form woocommerce-form-track-order track_order">
                                                            <p class="text-center">To track your order please enter your Order ID in the box
                                                                below and press the "Track" button. This was given to you on
                                                                your receipt and in the confirmation email you should have
                                                                received.</p>
                                                                <div class="row">
                                                                    <div class="col-md-5">
                                                                        <p class="form-row form-row-first">
                                                                            <label for="orderid">Order
                                                                                ID</label> <input class="input-text" type="text"
                                                                                name="orderid" id="orderid" value=""
                                                                                placeholder="Found in your order confirmation email.">
                                                                        </p>
                                                                    </div>
                                                                    <div class="col-md-5">
                                                                        <p class="form-row form-row-last"><label
                                                                            for="order_email">Billing email</label> <input
                                                                            class="input-text" type="text" name="order_email"
                                                                            id="order_email" value=""
                                                                            placeholder="Email you used during checkout."></p>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <p class="form-row mt-3"><button type="submit"
                                                                            class="button wp-element-button" name="track"
                                                                            value="Track">Track</button></p>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
    </main>
    <!-- End of Main -->
@endsection
