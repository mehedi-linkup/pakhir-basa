@extends('layouts.website')
@section('website-content')

 <!-- Start of Page Header -->
 <div class="page-header">
    <div class="container">
        <h1 class="page-title mb-0">Password Reset</h1>
    </div>
</div>
<!-- End of Page Header -->

<!-- Start of Breadcrumb -->
<nav class="breadcrumb-nav">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li>Password recover</li>
        </ul>
    </div>
</nav>
<!-- End of Breadcrumb -->

<section class="py-5">
    <div class="login-page page-content">
        <div class="container d-flex">
            <div class="login-popup mx-auto">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="text-center text-success"> Reset Password </h2>
                    </div>
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-body p-3">
                                <form action="{{route('forget.password.reset.update')}}" method="post">
                                  @csrf
                                  
                                <input type="hidden" name="email"  value="{{ $email }}">
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="form-group py-3 position-relative">
                                    <input type="text" name="password"   class="form-control px-3" placeholder="Enter New Password" >
                                </div>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                                <div class="form-group py-3 position-relative">
                                    <input type="text" name="confirmed"  class="form-control px-3" placeholder="Enter Confirm Password" >
                                </div>
                                @error('confirmed')
                                <span class="invalid-feedback" role="alert">
                                    <small>{{ $message }}</small>
                                </span>
                                @enderror
                                <div class="form-group py-3 d-flex">
                                    <span>
                                        <button type="submit" class="btn btn-success btn-primary">submit</button>
                                    </span>
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
@endsection

