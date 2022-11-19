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
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a href="#sign-in" class="nav-link active">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a href="#sign-up" class="nav-link">Sign Up</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="sign-in">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label>Username or email address *</label>
                                    <input type="text" class="form-control" name="username" id="username" required>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Password *</label>
                                    <input type="text" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="form-checkbox d-flex align-items-center justify-content-between">
                                    <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                                    <label for="remember1">Remember me</label>
                                    <a href="#">Last your password?</a>
                                </div>
                                <a href="#" class="btn btn-primary">Sign In</a>

                            </form>
                            
                        </div>
                        <div class="tab-pane" id="sign-up">
                            <div class="form-group">
                                <label>Your email address *</label>
                                <input type="text" class="form-control" name="email_1" id="email_1" required>
                            </div>
                            <div class="form-group mb-5">
                                <label>Password *</label>
                                <input type="text" class="form-control" name="password_1" id="password_1" required>
                            </div>
                            <div class="checkbox-content login-vendor">
                                <div class="form-group mb-5">
                                    <label>First Name *</label>
                                    <input type="text" class="form-control" name="first-name" id="first-name" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Last Name *</label>
                                    <input type="text" class="form-control" name="last-name" id="last-name" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Shop Name *</label>
                                    <input type="text" class="form-control" name="shop-name" id="shop-name" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Shop URL *</label>
                                    <input type="text" class="form-control" name="shop-url" id="shop-url" required>
                                  
                                </div>
                                <div class="form-group mb-5">
                                    <label>Phone Number *</label>
                                    <input type="text" class="form-control" name="phone-number" id="phone-number" required>
                                </div>
                            </div>
                            <div class="form-checkbox user-checkbox mt-0">
                                <input type="checkbox" class="custom-checkbox checkbox-round active" id="check-customer" name="check-customer" required="">
                                <label for="check-customer" class="check-customer mb-1">I am a customer</label>
                                <br>
                                <input type="checkbox" class="custom-checkbox checkbox-round" id="check-seller" name="check-seller" required="">
                                <label for="check-seller" class="check-seller">I am a vendor</label>
                            </div>
                            <p>Your personal data will be used to support your experience 
                                throughout this website, to manage access to your account, 
                                and for other purposes described in our <a href="#" class="text-primary">privacy policy</a>.</p>
                            <a href="#" class="d-block mb-5 text-primary">Signup as a vendor?</a>
                            <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                <input type="checkbox" class="custom-checkbox" id="remember" name="remember" required="">
                                <label for="remember" class="font-size-md">I agree to the <a  href="#" class="text-primary font-size-md">privacy policy</a></label>
                            </div>
                            <a href="#" class="btn btn-primary">Sign Un</a>
                        </div>
                    </div>
                    <p class="text-center">Sign in with social account</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-google fab fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

    {{-- <section class="py-5">
        <h2 class="text-center text-success"> Customer Login</h2>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-12">

                    <div class="card">
                        <div class="card-body p-3">
                            <form action="{{ route('customer.auth') }}" method="post">
                                @csrf
                                <div class="form-group py-3">
                                    <input type="text" name="userphone" class="form-control px-3" placeholder="Phone Number">
                                </div>
                                <div class="form-group py-3 position-relative">
                                    <input type="password" name="password" id="id_password" class="form-control px-3 "
                                        placeholder="Password"><i class="far fa-eye show-icon position-absolute"
                                        id="togglePassword" style="margin-left: -30px; cursor: pointer;"></i>
                                </div>
                                <div class="form-group py-3 d-flex">

                                    <div class="">
                                        <span>
                                            <a href="{{ route('customer.signup') }}" class="btn btn-success ms-auto"> Sign
                                                Up</a>
                                        </span>

                                    </div>
                                    <div class="ms-auto">
                                        <span class="">
                                            <button type="submit" class="btn btn-success ms-0 w-100">Login</button>
                                        </span>


                                        <div class="forget-password mt-2">
                                            <a href="{{ route('forget.password') }}" class="text-danger">Forget
                                                Password</a>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section> --}}
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
