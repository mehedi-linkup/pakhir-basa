@extends('layouts.website')
@section('website-content')

 <!-- Start of Page Header -->
 <div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">Account Recover</h1>
    </div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Account recover</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->

<div class="login-page page-content">
    <div class="container d-flex">
        <div class="login-popup mx-auto">
           <div class="row">
            <div class="col-md-12 col-12">
                <form action="{{ route('forget.password.store')}}" method="POST">
                    @csrf
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                    @endif

                    <div class="image-fluid d-flex justify-content-center">
                        <img src="{{ asset($content->logo) }}" alt="{{ $content->logo }}" style="height: 150px; width: 150px">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" id="email" required placeholder="Enter your email address">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <button type="submit" class="btn btn-primary w-100 sign-in">Submit</button>
                </form>
            </div>
            <a style="visibility: hidden" class="text-center mt-4">Recover your account</a>
           </div>          
        </div>
    </div>
</div>

@endsection
@push('website-js')
    <script>
    </script>
    
@endpush
