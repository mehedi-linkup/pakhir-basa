@extends('layouts.website')
@section('website-content')

     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><a href="{{ route('checkout.index') }}">My Account</a></li>
                {{-- <li><a>Order Complete</a></li> --}}
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content my-account pt-2">
        <div class="container">
            <h2 class="text-center text-success py-3">Order Details</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card mb-5">
                        <div class="w-100 mb-3" >
                            <button href="#"  onclick="printDiv('printableArea')" class="btn btn-secondary btn-sm"><i class="fa fa-print mr-1"></i>Print</button>
                        </div>
                        <div class="card-body" id="printableArea" style="border: 1px dotted gray">
                            <div class="">
                                <div class="order_details d-flex w-100">
                                    <span class="mb-3">Order No:&nbsp; </span> <span
                                        class=" ms-auto">{{ $invoice->invoice_no }}</span>
                                </div>
                                <div class="order_details d-flex w-100">
                                    <span class="mb-3">Customer Name:&nbsp; </span>
                                    @isset($invoice->customer)
                                        <span class=" ms-auto">{{ $invoice->customer->name }}</span>
                                    @endisset
                                </div>
                                <div class="order_details d-flex w-100">
                                    <span class="mb-3">Order From:&nbsp; </span> <span
                                        class="ms-auto">{{ $invoice->billing_address }}</span>
                                </div>
                                <div class="order_details d-flex w-100">
                                    <span class="mb-3">Order Shipping Address:&nbsp; </span> <span class="ms-auto">
                                        @isset($invoice->shipping_address)
                                            {{ $invoice->shipping_address }}
                                        @endisset
                                    </span>
                                </div>
                                <div class="w-100" style="border-bottom: 1px dotted#000;width:100%"></div>
                                @foreach ($order as $key => $item)
                                    <div class="d-flex w-100 order_details">
                                        <span>{{ $key+1 }}:&nbsp; </span><span class="me-2"> {{ $item->quantity }}x</span>
                                        <span>{{ $item->product_name }}</span> <span
                                            class="ms-auto">{{ (int) $item->price * $item->quantity }} Tk</span>
                                    </div>
                                @endforeach
                                <div class="order_details d-flex w-100">
                                    <span>Sub Total</span> <span
                                        class="ms-auto">{{ (int) $invoice->total_amount - $invoice->shipping_cost }}
                                        Tk</span>
                                </div>
                                <div class="order_details d-flex w-100">
                                    <span class="">Delivery Charge.</span> <span
                                        class="ms-auto">{{ $invoice->shipping_cost }} Tk</span>
                                </div>
                                <div class="w-100" style="border-bottom: 1px dotted#000;width:100%"></div>
                                <div class="order_details d-flex w-100">
                                    <span class="total_btn fw-bolder">Total</span> <span
                                        class="ms-auto fw-bolder">{{ $invoice->total_amount }} Tk</span>
                                </div>
                            </div>
                            <div class="mt-3">

                        
                            @isset($invoice->pending_msg)
                                <p> <b>Process Message :</b> {{ $invoice->pending_msg }}</p>
                            @endisset
                            @isset($invoice->process_msg)
                                <p> <b>On Process Message Message :</b> {{ $invoice->process_msg }}</p>
                            @endisset
                            @isset($invoice->way_msg)
                                <p> <b>On the Way Message :</b> {{ $invoice->way_msg }}</p>
                            @endisset
                            @isset($invoice->cancel_msg)
                                <p> <b>Cancel Message :</b> {{ $invoice->cancel_msg }}</p>
                            @endisset </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('website-js')
      <script>
          function printDiv(divName) {
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
          window.print();
          document.body.innerHTML = originalContents;
          let copy = $('#copy').text('Customer Copy')
          var printContents = document.getElementById(divName).innerHTML;
          var originalContents = document.body.innerHTML;
          document.body.innerHTML = printContents;
        //   window.print();
          document.body.innerHTML = originalContents;
      }
      </script>

  @endpush