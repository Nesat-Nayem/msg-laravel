@extends('frontend.layouts.app')
@section('head')
<link href="https://fonts.googleapis.com/css?family=Rubik:400,700&display=swap" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('frontend/assets/plugins/bootstrap/css/bootstrap.min.css') }}" />
<!-- Bootstrap Core JS -->
<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<style>
    html,
    body {
        height: 100%;
    }


    body {
        background: #c2e9fb;
        background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
        color: black;
        font-family: 'Rubik', sans-serif !important;
    }

    .container {

        display: flex;
        height: 100%;
        align-items: center;
        justify-content: center;
        padding-top: 85px;
        /* width: 400px; */
    }

    .form-signin {
        background: white;
        padding: 50px 80px;
        /* min-height: 620px; */
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

    @media only screen and (max-width: 576px) {
        .form-signin {
            min-width: 360px;
            flex-wrap: wrap;
            padding: 50px 0px;
        }

    }

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
        padding: 0 15px !important;
        justify-content: center;
    }

    .content {
        padding: 60px;
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
    @include('toastr')
    <div class="container">
        <div class="form-signin rounded-sm shadow">
            <div class="mx-auto mb-4">
                <h3 class="text-center">Subscription Plan</h3>
            </div>
            <div class="row">
                <div class="col-xl-12 col-md-12 col-12">
                    <div class="row pricing-box">
                        <form action="{{ route('subplan_store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-xl-12 col-md-6 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="pricing-header">
                                            <h2>Basic</h2>
                                            <p>Monthly Price</p>
                                        </div>
                                        <div class="pricing-card-price">
                                            <h3 class="heading2 price">₹0.00</h3>
                                            <p>Duration: <span>3 Months</span></p>
                                        </div>
                                        <ul class="pricing-options">
                                            <li>
                                                <i class="far fa-check-circle"></i> One listing
                                                submission
                                            </li>
                                            <li>
                                                <i class="far fa-check-circle"></i> 90 days expiration
                                            </li>
                                        </ul>
                                        <input type="hidden" name="plan" id="plan" value="Basic">
                                        <input type="hidden" name="amount" id="amount" value="0">
                                        <input type="hidden" name="status" id="status" value="paid">
                                        <input type="hidden" name="provider_id" id="provider_id" value="{{ $provider->id }}">
                                        <button type="submit" class="btn btn-primary btn-block w-100">Select Plan</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
