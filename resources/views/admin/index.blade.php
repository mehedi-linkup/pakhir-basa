@extends('layouts.admin')
@section('title', 'Home')
@push('admin-css')
    <style>
        a {
            color: #ffffff;
            text-decoration: none;
        }
    </style>
@endpush
@section('admin-content')
<main class="">
    <div class="container-fluid">
        <div class="heading-title p-2">
            <span class="my-3 heading "><i class="fas fa-home"></i> <a class="" href="">Home</a> > Dashboard</span>
        </div>
        <div class="row mt-3">
            <div class="col-xl-3 col-md-6 " >
                <div class="card mb-3 dashboard-card ">
                    <a href="{{route('order.index')}}" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fas fa-spinner fa-2x"></i> <span class="count">{{ $pending }}</span>
                        </div>
                        
                        <p class="dashboard-card-text">Pending Order</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{route('order.onProcess')}}" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fas fa-project-diagram fa-2x"></i> <span class="count">{{ $process }}</span>
                        </div>
                         
                        <p class="dashboard-card-text">On Processing Order</p>
                    </a>
                </div>
            </div>
          
            
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{route('order.way')}}" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fas fa-road fa-2x"></i> <span class="count">{{ $way }}</span>
                        </div>
                        
                        <p class="dashboard-card-text"> On The way</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a class="card-body mx-auto" href="{{route('order.delivary')}}">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fas fa-truck-loading fa-2x"></i> <span class="count">{{ $delivered }}</span>
                        </div>
                        <p class="dashboard-card-text">Delivered Order</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{route('sales.report')}}" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fas fa-balance-scale-left fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Sales report</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('product.index') }}" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fab fa-product-hunt fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Product List</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('profile.edit') }}" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="far fa-money-bill-alt fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Company Profile</p>
                    </a>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card mb-3 dashboard-card">
                    <a href="{{ route('logout') }}" onclick="return confirm('Are you sure logout from Admin Panel')" class="card-body mx-auto">
                        <div class=" d-flex justify-content-center align-items-center">
                            <i class="fa fa-sign-out-alt fa-2x"></i>
                        </div>
                        <p class="dashboard-card-text">Logout</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection