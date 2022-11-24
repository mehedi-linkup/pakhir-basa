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
                    <h2 class="text-center text-success"> Customer Sign-Up</h2>
                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-body p-2">
                                    <form action="{{ route('customerStore') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" name="name"
                                                class="form-control @error('name') is-invalid @enderror"
                                                placeholder="Enter Name *">
                                            @error('name')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Phone Number</label>
                                            <input type="number" name="phone"
                                                class="form-control @error('phone') is-invalid @enderror"
                                                placeholder="Phone Number *">
                                            @error('phone')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email Number *">
                                            @error('email')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" name="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password">
                                            @error('password')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-group">
                                            <label for="">District</label>
                                            <select name="district_id" id="district_id"
                                                class="form-control @error('district_id') is-invalid @enderror">
                                                <option value="">Select District</option>
                                                @foreach ($district as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('district_id')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label for="">Thana</label>
                                            <select name="thana_id" id="thana_id"
                                                class="form-control  @error('thana_id') is-invalid @enderror">
                                                @foreach ($thana as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('thana_id')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <label for="">Area</label>
                                            <select name="area_id" id="area_id"
                                                class="form-control  @error('area_id') is-invalid @enderror">
                                                @foreach ($area as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('area_id')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div> --}}
                                        <div class="form-group">
                                            <label for="">Address</label>
                                            <textarea name="address" class="form-control  @error('address') is-invalid @enderror" rows="3"
                                                placeholder="Address"></textarea>
                                            @error('address')
                                                <span class="invalid-feedback text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group d-flex">
                                            <span class="ms-auto">
                                                <button type="submit" class="btn btn-primary ">Sign Up</button>
                                            </span>
                                        </div>
                                    </form>
                                    <a href="{{ route('customer.login') }}" class="text-center mt-4">Already registered ? Click here to login</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        @push('website-js')
            <script type="text/javascript">
                //  Get Subject Javascript
                $(document).on("change", "#district_id", function() {
                    var district_id = $("#district_id").val();
                    console.log(district_id);
                    $.ajax({
                        url: "{{ route('thana.change') }}",
                        type: "GET",
                        data: {
                            district_id: district_id
                        },
                        success: function(data) {
                            var html = '<option value="">Select Thana </option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v.name + ' </option>';
                            });
                            $("#thana_id").html(html);
                        }
                    });
                });
            </script>
            <script type="text/javascript">
                //  Get Subject Javascript
                $(document).on("change", "#thana_id", function() {
                    var thana_id = $("#thana_id").val();

                    $.ajax({
                        url: "{{ route('area.change') }}",
                        type: "GET",
                        data: {
                            thana_id: thana_id
                        },
                        success: function(data) {
                            var html = '<option value="">Select Area </option>';
                            $.each(data, function(key, v) {
                                html += '<option value="' + v.id + '">' + v.name + ' </option>';
                            });
                            $("#area_id").html(html);
                        }
                    });
                });
            </script>
        @endpush
    @endsection
