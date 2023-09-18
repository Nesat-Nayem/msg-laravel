@extends('frontend.layouts.app')
@section('head')
    <style>
        .btn-primary {
            background: #016bb5;
            border-color: #016bb5;
        }
    </style>
@endsection
@section('content')
    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2>Contact Us</h2>
                    </div>
                </div>
                <div class="col-auto float-end ms-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Contact Us
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <section class="contact-us">
        <div class="content">
            @include('toastr')
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-queries">
                            <h4 class="mb-4">Drop your Queries</h4>
                            <form action="{{ route('contactus.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">First Name</label>
                                        <input value="{{ old('firstname') }}" type="text"
                                            class="form-control @error('firstname') is-invalid @enderror" name="firstname"
                                            id="firstname" placeholder="Enter First Name" required>
                                        @error('firstname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Last Name</label>
                                        <input value="{{ old('lastname') }}" type="text"
                                            class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                            id="lastname" placeholder="Enter Last Name" required>
                                        @error('lastname')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Email</label>
                                        <input value="{{ old('email') }}" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            id="email" placeholder="Enter Email ID" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Mobile Number</label>
                                        <input value="{{ old('mobilenumber') }}" type="text" min="0"
                                            onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                            pattern="[6-9]{1}[0-9]{9}"
                                            class="form-control @error('mobilenumber')
is-invalid
@enderror"
                                            name="mobilenumber" id="mobilenumber" placeholder="Enter Mobile Number"
                                            required>
                                        @error('mobilenumber')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-12">
                                        <label class="me-sm-2">Message</label>
                                        <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror"
                                            placeholder="Enter Message">{{ old('message') }}</textarea>
                                        @error('message')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12 mb-4">
                                        <div class="submit-section">
                                            <button class="btn btn-primary btn-lg ps-5 pe-5" type="submit">
                                                Submit
                                            </button>
                                            <button class="ms-2 btn btn-danger btn-lg ps-5 pe-5" type="reset">
                                                Reset
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="contact-details">
                            <div class="contact-info">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="contact-data">
                                    <h4>Address</h4>
                                    <p>
                                        367 Hillcrest Lane, Irvine, California, United States
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="contact-info">
                                <i class="fas fa-phone-alt"></i>
                                <div class="contact-data">
                                    <h4>Phone</h4>
                                    <p>+21 256 259 8796</p>
                                    <p>+21 895 158 6545</p>
                                </div>
                            </div>
                            <hr />
                            <div class="contact-info">
                                <i class="fab fa-skype"></i>
                                <div class="contact-data">
                                    <h4>Skype</h4>
                                    <p>BuyLokaly</p>
                                </div>
                            </div>
                            <hr />
                            <div class="contact-info">
                                <i class="far fa-envelope"></i>
                                <div class="contact-data">
                                    <h4>Email</h4>
                                    <p>
                                        <a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                            data-cfemail="21555354444d5852444d4d614459404c514d440f424e4c">[email&#160;protected]</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="map-grid">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d250646.68136328788!2d76.82714556974858!3d11.012014523817232!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859af2f971cb5%3A0x2fc1c81e183ed282!2sCoimbatore%2C%20Tamil%20Nadu!5e0!3m2!1sen!2sin!4v1596472179383!5m2!1sen!2sin"
            allowfullscreen="" aria-hidden="false" tabindex="0" class="contact-map"></iframe>
    </div>
@endsection
