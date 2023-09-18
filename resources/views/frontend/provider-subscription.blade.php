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
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 sidebar pt-3">
                    <div class="mb-4">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                            @if ($provider->profileimage != '' || $provider->profileimage != null)
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
                                <a href="{{ route('providerdashboard') }}" class="nav-link">
                                    <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myservices') }}" class="nav-link">
                                    <i class="far fa-address-book"></i>
                                    <span>My Services</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providerbookings') }}" class="nav-link">
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
                                <a href="{{ route('providersubscription') }}" class="nav-link active">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>Subscription</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('provideravailability') }}" class="nav-link">
                                    <i class="far fa-clock"></i> <span>Availability</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="{{route('providerreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('providerpayment') }}" class="nav-link">
                                    <i class="fas fa-hashtag"></i> <span>Payment</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('provider.changepassword', $provider->id) }}" class="nav-link">
                                    <i class="fas fa-key"></i> <span>Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8 subscription">
                    <div class="row pricing-box">
                        <div class="col-xl-4 col-md-6">
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
                                    <a href="javascript:void(0);" class="btn btn-primary btn-block w-100">Select Plan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="plan-det">
                                <h6 class="title">Plan Details</h6>
                                <ul class="row">
                                    <li class="col-sm-4">
                                        <p>
                                            <span class="text-muted">Started On</span>
                                            {{ $provider->subscription->created_at->format('d M Y') }}
                                        </p>
                                    </li>
                                    <li class="col-sm-4">
                                        <p><span class="text-muted">Price</span> ₹{{ $provider->subscription->amount }}</p>
                                    </li>
                                </ul>
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
