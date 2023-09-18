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
                                <a href="{{ route('providerbookings') }}" class="nav-link active">
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
                                <a href="{{ route('providersubscription') }}" class="nav-link">
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
                <div class="col-xl-9 col-md-8">
                    <div class="row align-items-center mb-4">
                        <div class="col">
                            <h4 class="widget-title bookinglist mb-0">Booking List</h4>
                        </div>
                        <div class="col-auto bookinglist">
                            <div class="sort-by">
                                <select class="form-control-sm custom-select searchFilter" id="status">
                                    <option>All</option>
                                    <option>Pending</option>
                                    <option>Inprogress</option>
                                    <option>Complete Request</option>
                                    <option>Rejected</option>
                                    <option>Cancelled</option>
                                    <option>Completed</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="dataList">
                        @foreach ($bookings as $booking)
                            <div class="bookings">
                                <div class="booking-list">
                                    <div class="booking-widget">
                                        <a href="#" class="booking-img">
                                            @if ($booking->service->serviceimage != '' || $booking->service->serviceimage != null)
                                                <img src="{{ url('/images/admin/serviceimage/' . $booking->service->serviceimage) }}"
                                                    alt="Service Image" />
                                            @else
                                                <img src="{{ asset('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                    alt="Service Image" />
                                            @endif
                                        </a>
                                        <div class="booking-det-info">
                                            <h3>
                                                <a href="#">{{ $booking->service->servicetitle }}</a>
                                            </h3>
                                            <ul class="booking-details">
                                                <li>
                                                    <span>Booking Date</span>{{ $booking->created_at->format('d M Y') }}
                                                </li>
                                                <li><span>Booking time</span> {{ $booking->service_timeslot }}</li>
                                                <li><span>Amount</span> {{ $booking->serviceamount }}</li>
                                                <li>
                                                    <span>Location</span> {{ $booking->city->cityname }},
                                                    {{ $booking->city->state->statename }}
                                                </li>
                                                <li><span>Phone</span> {{ $booking->user->contactno }}</li>
                                                <li>
                                                    <span>User</span>
                                                    <div class="avatar avatar-xs me-1">
                                                        <img class="avatar-img rounded-circle" alt="User Image"
                                                            src="{{ url('/images/admin/usersprofileimage/' . $booking->user->profileimage) }}" />
                                                    </div>
                                                    {{ $booking->user->name }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="booking-action"></div>
                                </div>
                            </div>
                        @endforeach
                        <div class="mt-4">
                            {{ $bookings->links('pagination::bootstrap-5') }}
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
