@extends('frontend.layouts.app')
@section('head')
<style>
    .sidebar {
        background-color: #016bb5;
    }

    .widget {
        color: white !important;
    }

    .settings-menu ul li a {
        color: #fff;
        padding: 0;
        border: 0 !important;
        display: inline-block;
    }

    .nav-link:focus,
    .nav-link:hover {
        color: #ff6800;
    }

</style>
@endsection
@section('content')
<div class="content">
    @include('toastr')
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4 sidebar pt-3">
                <div class="mb-4">
                    <div class="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                        @if($provider->profileimage != '' || $provider->profileimage != null)
                        <img alt="profile image"
                            src="{{ url('/images/admin/providerprofileimage/' . $provider->profileimage) }}"
                            class="avatar-lg rounded-circle" />
                        @else
                        <img alt="profile image"
                            src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                            class="avatar-lg rounded-circle" />
                        @endif
                        <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                            <h6 class="text-white mb-0">{{ $provider->name }}</h6>
                            <p class="text-white mb-0">Member Since {{ $provider->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="widget settings-menu">
                    <ul>
                        <li class="nav-item">
                            <a href="{{route('providerdashboard')}}" class="nav-link active">
                                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('myservices')}}" class="nav-link">
                                <i class="far fa-address-book"></i>
                                <span>My Services</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('providerbookings')}}" class="nav-link">
                                <i class="far fa-calendar-check"></i>
                                <span>Booking List</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('providersettings', $provider->id) }}" class="nav-link">
                                <i class="far fa-user"></i> <span>Profile Settings</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('providerwallet')}}" class="nav-link">
                                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('providersubscription')}}" class="nav-link">
                                <i class="far fa-calendar-alt"></i>
                                <span>Subscription</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('provideravailability')}}" class="nav-link">
                                <i class="far fa-clock"></i> <span>Availability</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('providerreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('providerpayment')}}" class="nav-link">
                                <i class="fas fa-hashtag"></i> <span>Payment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('provider.changepassword', $provider->id)}}" class="nav-link">
                                <i class="fas fa-key"></i> <span>Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h4 class="widget-title dashboard">Dashboard</h4>
                <div class="row">
                    <div class="col-lg-4">
                        <a href="{{ route('providerbookings')}}" class="dash-widget dash-bg-1">
                            <span class="dash-widget-icon">{{ $userbook }}</span>
                            <div class="dash-widget-info">
                                <span>Bookings</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="{{ route('myservices')}}" class="dash-widget dash-bg-2">
                            <span class="dash-widget-icon">{{ $service_all }}</span>
                            <div class="dash-widget-info">
                                <span>Services</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4">
                        <a href="#" class="dash-widget dash-bg-3">
                            <span class="dash-widget-icon">{{
                                Auth::guard('providerpanel')->user()->unreadNotifications->count() }}</span>
                            <div class="dash-widget-info">
                                <span>Notification</span>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="card mb-0">
                    <div class="row no-gutters">
                        <div class="col-lg-8">
                            <div class="card-body">
                                <h6 class="title">Plan Details</h6>
                                @if($provider->subscription)
                                <div>
                                    <div class="sp-plan-name">
                                        <h6 class="title">
                                            {{ $provider->subscription->plan ?? ''}}
                                            <span class="badge badge-success badge-pill">Active</span>
                                        </h6>
                                    </div>
                                    <ul class="row">
                                        <li class="col-6 col-lg-6">
                                            <p>Started On {{ $provider->subscription->created_at->format('d M, Y') ?? ''}}</p>
                                        </li>
                                        <li class="col-6 col-lg-6">
                                            <p>Price ₹{{ $provider->subscription->amount ?? ''}}</p>
                                        </li>
                                    </ul>
                                    <h6 class="title">Last Payment</h6>
                                    <ul class="row">
                                        <li class="col-sm-6">
                                            <p>Paid at {{ $provider->subscription->created_at->format('d M, Y') ?? ''}}</p>
                                        </li>
                                        <li class="col-sm-6">
                                            <p>
                                                <span class="text-success">Paid</span>
                                                <span class="amount">₹{{ $provider->subscription->amount ?? '' }}</span>
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="sp-plan-action card-body">
                                <div class="mb-2">
                                    <a href="{{ route('providersubscription')}}" class="btn btn-primary"><span>Change Plan</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- Sticky Sidebar JS -->
<script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
<script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>
@endsection
