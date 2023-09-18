@extends('frontend.layouts.app')
@section('head')
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">
    <script src="{{ asset('toastr/jquery.min.js') }}"></script>
    <script src="{{ asset('toastr/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            // "newestOnTop": false,
            // "positionClass": "toast-bottom-center",
            // "preventDuplicates": false,
            // "onclick": null,
            // "showDuration": "300",
            // "hideDuration": "1000",
            // "timeOut": "5000",
            // "extendedTimeOut": "1000",
            // "showEasing": "swing",
            // "hideEasing": "linear",
            // "showMethod": "fadeIn",
            // "hideMethod": "fadeOut"
        }
    </script>
    <style>
        html,
        body {
            height: 100%;
        }


        body {
            background: #c2e9fb;
            background-image: linear-gradient(120deg, #d2e3ff 0%, #c2e9fb 100%);
            color: black;
            font-family: 'Rubik', sans-serif !important;
        }

        .containeromm {

            display: flex;
            height: 100%;
            align-items: center;
            justify-content: center;
            /* padding-top: 5px; */
            /* width: 400px; */
        }

        .form-signin {
            background: white;
            padding: 50px 50px;
            min-height: 620px;
            width: 500px;
        }

        .logo {
            width: 200px;
        }

        .one-line {
            display: flex;
        }

        .forgot {
            margin-left: auto;
        }

        /* @media only screen and (max-width: 576px) {
                    .form-signin {
                        min-width: 360px;
                        flex-wrap: wrap;
                        padding: 50px 0px;
                    }

                } */

        /* not active */
        .nav-pills .pill-1 .nav-link:not(.active) {
            border: none;
            color: #6c757d !important;
            font-weight: 700;
            width: 0%;
            transition: width 0.4s;
        }

        .nav-pills .pill-2 .nav-link:not(.active) {
            border: none;
            color: #6c757d !important;
            font-weight: 700;
            width: 0%;
            transition: width 0.4s;
        }


        /* active (faded) */
        .nav-pills .pill-1 .nav-link {
            background: white !important;
            border-bottom: 2px solid #007bff;
            color: #212529 !important;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .nav-pills .pill-2 .nav-link {
            background: white !important;
            border-bottom: 2px solid #007bff;
            color: #212529 !important;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .nav-pills .pill-1 .nav-link:hover {
            color: #212529 !important;
            width: 100%;
            border-bottom: 2px solid #007bff;

        }

        .nav-pills .pill-2 .nav-link:hover {
            color: #212529 !important;
            width: 100%;
            border-bottom: 2px solid #007bff;
        }


        .nav {
            padding: 0 15px;
            justify-content: center;
        }

        .content {
            padding: 30px;
        }

        .form-control {
            min-height: 38px;
        }

        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }

        h3 {
            color: #FF6800;
        }

        .btn {
            background-color: #066BB1;
            color: #fff;
            border: #066BB1;
        }

        .btn:hover {
            background-color: #FF6800;
            color: #fff;
            border: #FF6800;
        }

        .modal-title {
            color: #FF6800;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="containeromm">
            @include('toastr')
            <div class="form-signin rounded-sm shadow">
                <div class="mx-auto mb-4" id="login">
                    <h3 class="text-center">Provider Login</h3>
                </div>
                <div class="mx-auto mb-4" id="register">
                    <h3 class="text-center">Provider Register</h3>
                </div>
                <!-- Nav tabs -->
                <ul class="nav nav-pills mb-4">
                    <li class="nav-item pill-1">
                        <a class="nav-link active rounded-0" id="nav-login-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-login" role="tab" aria-controls="nav-login"
                            aria-selected="true">Login</a>
                    </li>
                    <li class="nav-item pill-2">
                        <a class="nav-link rounded-0" id="nav-register-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-register" role="tab" aria-controls="nav-register"
                            aria-selected="false">Register</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Tab1 -->
                    <div id="nav-login" class="containeromm tab-pane fade show active p-0 m-0 mb-0"
                        aria-labelledby="nav-login-tab" role="tabpanel">
                        <form method="POST" action="{{ route('provider.providerloginstore') }}">
                            @csrf
                            <div>
                                <div class="form-floating">
                                    <input type="email" id="floatingInput" name="email"
                                        class="form-control mb-4 @error('email') is-invalid @enderror"
                                        placeholder="Enter Email address" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" id="floatingInput" name="password"
                                        class="form-control mb-4 @error('password') is-invalid @enderror"
                                        placeholder="Enter Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Password</label>
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn btn-lg btn-block" type="submit">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Tab2 -->
                    <div id="nav-register" class="containeromm tab-pane  p-0 m-0" role="tabpanel"
                        aria-labelledby="nav-register-tab">
                        <form action="{{ route('providerregister') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <div class="form-floating">
                                    <input type="text" id="floatingInput" name="name"
                                        class="form-control mb-4 @error('name') is-invalid @enderror"
                                        placeholder="Enter Name" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Name</label>
                                </div>
                                <div class="form-floating">
                                    <input type="text" min="0" id="floatingInput"
                                        onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                        pattern="[6-9]{1}[0-9]{9}" name="mobilenumber"
                                        class="form-control mb-4 @error('mobilenumber')
is-invalid
@enderror"
                                        placeholder="Enter Mobile Number" required>
                                    @error('mobilenumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Mobile Number</label>
                                </div>
                                <div class="form-floating">
                                    <input type="email" id="floatingInput" name="email"
                                        class="form-control mb-4 @error('email') is-invalid @enderror"
                                        placeholder="Enter Email address" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Email address</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" id="floatingInput" name="password"
                                        class="form-control mb-4 @error('password') is-invalid @enderror"
                                        placeholder="Enter Password" required>
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Password</label>
                                </div>
                                <div class="form-floating">
                                    <input type="password" id="floatingInput" name="confirmpassword"
                                        class="form-control mb-4 @error('confirmpassword') is-invalid @enderror"
                                        placeholder="Confirm Password" required>
                                    @error('confirmpassword')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="floatingInput">Confirm Password</label>
                                </div>
                                <label for="floatingInput">Profile Image</label>
                                <div class="form-floating">
                                    <input type="file" id="floatingInput" name="profileimage"
                                        class="form-control pt-3">
                                </div>
                                <div class="d-flex justify-content-center mt-5">
                                    <button class="btn btn-lg btn-block" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ asset('frontend/assets/js/jquery-3.6.0.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var x = document.getElementById("register");
            var y = document.getElementById("login");

            $('#register').hide();
            $('#login').show();

            $('#nav-register-tab').on('click', function() {
                $('#login').hide();
                $('#register').show();
            });

            $('#nav-login-tab').on('click', function() {
                $('#register').hide();
                $('#login').show();
            });
        });
    </script>
@endsection
