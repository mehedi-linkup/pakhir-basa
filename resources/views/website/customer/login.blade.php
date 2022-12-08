@extends('layouts.website')
@section('website-content')
<main class="main login-page">
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
                <li><a href="index.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
               <div class="row">
                <div class="col-md-12 col-12">
                    <form action="{{ route('customer.auth')}}" method="POST">
                        @csrf
                        <div class="image-fluid d-flex justify-content-center">
                            <img src="{{ asset($content->logo) }}" alt="{{ $content->logo }}" style="height: 150px; width: 150px">
                        </div>
                        <div class="form-group">
                            <label>Email address *</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group mb-0">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>
                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            {{-- <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                            <label for="remember1">Remember me</label> --}}
                            <a href="#">Forgot password?</a>
                        </div> 
                     
                        <button type="submit" class="btn btn-primary w-100 sign-in">Sign In</button>

                    </form>
                </div>
                <a href="{{ route('customer.signup') }}" class="text-center mt-4">Not Register? Sign Up Here</a>
               </div>          
            </div>
                   
            {{-- <p class="text-center">Sign in with social account</p>
            <div class="social-icons social-icon-border-color d-flex justify-content-center">
                <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                <a href="#" class="social-icon social-google fab fa-google"></a>
            </div> --}}
        </div>
    </div>
</main>
    <?php
    Session::forget('phone');
    ?>
@endsection
@push('website-js')
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#id_password');

        togglePassword.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

@endpush
