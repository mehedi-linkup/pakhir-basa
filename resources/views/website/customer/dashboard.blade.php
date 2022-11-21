@extends('layouts.website')
@section('website-content')

    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content my-account pt-2">
        <div class="container">
            @if(Auth::guard('customer')->user()->status == 'a')
            <div class="tab tab-vertical row gutter-lg">
                <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link">Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-addresses" class="nav-link">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link">Account details</a>
                    </li>
                    <li class="link-item">
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
                            <a href="#" class="text-primary">Log out</a>)
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
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
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
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
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
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
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
                            <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
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
                        <table class="shop-table account-orders-table mb-6">
                            <thead>
                                <tr>
                                    <th class="order-id">Order</th>
                                    <th class="order-date">Date</th>
                                    <th class="shipping-address">shipping-address</th>
                                    <th class="shipping-cost">shipping-cost</th>
                                    <th class="delivery-data">sdelivery-data</th>
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
                                    <td class="shipping-address">{{$item->shipping_address}}</td>
                                    <td class="shipping-cost">{{$item->shipping_cost}}</td>
                                    <td class="delivery-data">@if(isset($item->delivery_date)){{$item->delivery_date}}@endif</td>
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
                                        <span class="order-price">{{$item->total_amount}}</span> for
                                        <span class="order-quantity">{{2}}</span> item
                                    </td>
                                    <td class="order-action">
                                        @if ($item->status == 'c' || $item->status == 'd')
                                        <a href="{{route('invoice.customer',$item->id)}}"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        @elseif($item->status == 'on' || $item->status == 'w')
                                        <a href="javascript:void(0)"  id="procesing" onclick="processing({{$item->id}})" data-bs-toggle="modal" data-bs-target="#myModal"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        @else
                                        <a href="{{route('customer.order.cancel',$item->id)}}"
                                            class="btn btn-outline btn-default btn-block btn-sm btn-rounded">View</a>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Go
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
                                    <address class="mb-4">
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
                                        your billing address<i class="w-icon-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-6">
                                <div class="ecommerce-address shipping-address pr-lg-8">
                                    <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                                    <address class="mb-4">
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
                                            </tbody>
                                        </table>
                                    </address>
                                    <a href="#"
                                        class="btn btn-link btn-underline btn-icon-right text-primary">Edit your
                                        shipping address<i class="w-icon-long-arrow-right"></i></a>
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
                            </div>
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
                            <div class="form-group mb-3">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" cols="30" rows="10" class="form-control form-control-md mb-0">{{Auth::guard('customer')->user()->address}}</textarea>
                                @error('address')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Picture</label>
                                <input type="file" class="form-control form-control-md mb-0" name="profile_picture" id="image" onchange="readURL(this);">
                                @error('address')
                                    <span class="invalid-feedback text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="#" alt="" id="previewImage" class="customer-image" style="width: 110px">
                                </div>
                            </div>
                            {{-- <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                            <div class="form-group">
                                <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                                <input type="password" class="form-control form-control-md"
                                    id="cur-password" name="cur_password">
                            </div>
                            <div class="form-group">
                                <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                                <input type="password" class="form-control form-control-md"
                                    id="new-password" name="new_password">
                            </div>
                            <div class="form-group mb-10">
                                <label class="text-dark" for="conf-password">Confirm Password</label>
                                <input type="password" class="form-control form-control-md"
                                    id="conf-password" name="conf_password">
                            </div> --}}
                            <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
            @else 
            <h4 class="text-center text-danger">Your Account Inactive. Please contact Admin</h4>
            @endif
        </div>
    </div> 
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
    function processing(id){
        var url = "/customer-invoice-remove/"+id;
        $('#modal-form').attr('action',url);
    }
</script>
    
@endsection
