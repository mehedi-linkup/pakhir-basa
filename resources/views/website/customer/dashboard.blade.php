@extends('layouts.website')
@section('website-content')
     <!-- Start of Breadcrumb -->
     <nav class="breadcrumb-nav" style="background-color: #202020">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{ route('home') }}">Home</a></li>
                <li class="active"><a href="{{ route('checkout.index') }}">My Account</a></li>
                {{-- <li><a>Order Complete</a></li> --}}
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content my-account pt-6" style="background-color: #5c340121">
        <div class="container">
            @if(Auth::guard('customer')->user()->status == 'a')
            <div class="tab tab-vertical row gutter-lg">
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a href="#account-dashboard" class="nav-link active"><i class="fas fa-home"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link"> <i class="w-icon-orders"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-addresses" class="nav-link"><i class="w-icon-map-marker"></i> Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link"> <i class="w-icon-user"></i> Account details</a>
                    </li>
                    <li class="link-item">
                        <i class="w-icon-logout"></i>
                        <a href="{{ route('customerLogout') }}">Logout</a>
                    </li>
                </ul>

                <div class="tab-content mb-6">
                    <div class="tab-pane active in" id="account-dashboard">
                        <p class="greeting">
                            Hello
                            <span class="text-dark font-weight-bold">{{ Auth::guard('customer')->user()->name }}</span>
                            (not
                            <span class="text-dark font-weight-bold">{{ Auth::guard('customer')->user()->name }}</span>?
                            <a href="{{ route('customerLogout') }}" class="text-primary">Log out</a>)
                        </p>

                        <p class="mb-4">
                            From your account dashboard you can view your <a href="#account-orders"
                                class="text-primary link-to-tab">recent orders</a>,
                            manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                                and billing
                                addresses</a>, and
                            <a href="#account-details" class="text-primary link-to-tab">edit your password and
                                account details.</a>
                        </p>

                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-orders" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-orders">
                                            <i class="w-icon-orders"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Orders</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-addresses" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-address">
                                            <i class="w-icon-map-marker"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Addresses</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="#account-details" class="link-to-tab">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-account">
                                            <i class="w-icon-user"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Account Details</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-4 col-xs-6 mb-4">
                                <a href="{{ route('customerLogout') }}">
                                    <div class="icon-box text-center">
                                        <span class="icon-box-icon icon-logout">
                                            <i class="w-icon-logout"></i>
                                        </span>
                                        <div class="icon-box-content">
                                            <p class="text-uppercase mb-0">Logout</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane mb-4" id="account-orders">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-orders">
                                <i class="w-icon-orders"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title text-capitalize ls-normal mb-0">Orders</h4>
                            </div>
                        </div>
                        <table class="shop-table account-orders-table mb-6 ">
                            <thead>
                                <tr>
                                    <th class="order-id border">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="customer-address">Customer Address</th>
                                    <th class="shipping-address">shipping-address</th>
                                    <th class="shipping-cost">shipping-cost</th>
                                    {{-- <th class="delivery-data">delivery-data</th> --}}
                                    <th class="order-status">Status</th>
                                    <th class="order-total">Total</th>
                                    <th class="order-actions">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                <tr>
                                    <td class="order-id">#{{$item->invoice_no}}</td>
                                    <td class="order-date">{{$item->created_at->format('d/m/y')}}</td>
                                    <td class="shipping-address">{{$item->billing_address}}</td>
                                    <td class="shipping-address">{{$item->s_address? $item->s_address : $item->billing_address}}</td>
                                    <td class="shipping-cost">{{$item->shipping_cost}}</td>
                                    {{-- <td class="delivery-data">@if(isset($item->delivery_date)){{$item->delivery_date}}@endif</td> --}}
                                    <td class="order-status">
                                        @if ($item->status == 'p')
                                        Pending
                                        @elseif($item->status == 'on')
                                            On Process
                                        @elseif($item->status == 'w')
                                        On The Way
                                        @elseif($item->status == 'd')
                                        Delivered
                                        @elseif($item->status == 'c')
                                        Cancel
                                        @endif
                                    </td>
                                    <td class="order-total">
                                        <span class="order-price">{{$item->total_amount + $item->shipping_cost }}</span> for
                                        <span class="order-quantity">{{ \App\Models\OrderDetails::where('order_id', $item->id)->count() }}</span> item
                                    </td>
                                    <td class="order-action">
                                        @if ($item->status == 'c' || $item->status == 'd')
                                        <a href="{{route('invoice.customer',$item->id)}}"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        @elseif($item->status == 'on' || $item->status == 'w')
                                        <a href="" id="procesing" onclick="processing(event, {{$item->id}})" data-bs-toggle="modal" data-bs-target="#myModal"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        @else
                                        <a href="{{route('customer.order.cancel',$item->id)}}"
                                            class="btn btn-danger btn-block btn-sm btn-rounded" title="Cancel Order"><i class="fas fa-backspace"></i></a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{route('shop.box')}}" class="btn btn-dark btn-rounded btn-icon-right">Go
                            Shop<i class="w-icon-long-arrow-right"></i></a>
                    </div>

                    <div class="tab-pane" id="account-addresses">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-map-marker">
                                <i class="w-icon-map-marker"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                            </div>
                        </div>
                        <p>The following addresses will be used on the checkout page
                            by default.</p>
                        <div class="row">
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address billing-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>

                                    <div>
                                        <address class="mb-4">
                                            {{ Auth::guard('customer')->user()->address }}
                                        </address>
                                    </div>
                                    {{-- <address class="mb-4">
                                        <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>92020</td>
                                                </tr>
                                                <tr>
                                                    <th>Phone:</th>
                                                    <td>1112223334</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="#"
                                        class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                        your billing address<i class="w-icon-long-arrow-right"></i></a> --}}
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
                                        {{ Auth::guard('customer')->user()->address }}
                                        {{-- <table class="address-table">
                                            <tbody>
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>John Doe</td>
                                                </tr>
                                                <tr>
                                                    <th>Company:</th>
                                                    <td>Conia</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>Wall Street</td>
                                                </tr>
                                                <tr>
                                                    <th>City:</th>
                                                    <td>California</td>
                                                </tr>
                                                <tr>
                                                    <th>Country:</th>
                                                    <td>United States (US)</td>
                                                </tr>
                                                <tr>
                                                    <th>Postcode:</th>
                                                    <td>92020</td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                    </address>
                                    {{-- <a href="#"
                                        class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                        shipping address<i class="w-icon-long-arrow-right"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="account-details">
                        <div class="icon-box icon-box-side icon-box-light">
                            <span class="icon-box-icon icon-account mr-2">
                                <i class="w-icon-user"></i>
                            </span>
                            <div class="icon-box-content">
                                <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                            </div>
                        </div>
                        <form action="{{route('customerUpdate')}}" method="post" enctype="multipart/form-data" class="form account-details-form">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" placeholder="Enter Name"
                                            class="form-control form-control-md" value="{{Auth::guard('customer')->user()->name}}">
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="number" id="phone" name="phone" placeholder="Enter Number"
                                            class="form-control form-control-md" value="{{ Auth::guard('customer')->user()->phone }}">
                                        @error('name')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="email">Email *</label>
                                        <input type="text" id="email" name="email" placeholder="Enter email"
                                            class="form-control form-control-md mb-0" value="{{Auth::guard('customer')->user()->email }}">
                                        @error('email')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-md mb-0">{{Auth::guard('customer')->user()->address}}</textarea>
                                        @error('address')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="image">Picture</label>
                                        <input type="file" class="form-control form-control-md mb-0" name="profile_picture" id="image" onchange="readURL(this);">
                                        @error('address')
                                            <span class="invalid-feedback text-danger" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror  
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <img src="#" alt="" id="previewImage" class="customer-image" style="width: 110px; height:100px;">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            @else 
            <h4 class="text-center text-danger">Your Account Inactive. Please contact Admin</h4>
            @endif
            <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <form action="" id="modal-form" method="post">
                        @csrf
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Write Your message to customer</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                
                        <!-- Modal body -->
                        <div class="modal-body">
                            <textarea name="message" id="" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="submit" class="btn btn-success" data-bs-dismiss="modal">Send</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
    </div> 
@endsection
@push('website-js')
<script> 
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload=function(e) {
                $('#previewImage')
                    .attr('src', e.target.result)
                    .width(100);
                   
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.getElementById("previewImage").src="{{ asset('uploads/customer/'.Auth::guard('customer')->user()->profile_picture) }}";
</script> 
<script>
    function processing(e, id) {
        e.preventDefault();
        var url = "/customer-invoice-remove/"+id;
        $('#modal-form').attr('action', url);
    }
</script>
@endpush
