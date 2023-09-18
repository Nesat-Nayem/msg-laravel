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

    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        color: #495057;
        background-color: #066BB1;
        border-color: #dee2e6 #dee2e6 #fff;
    }

    .nav-tabs .nav-link:focus,
    .nav-tabs .nav-link:hover {
        background-color: #eee;
        border-color: transparent;
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
                        @if($user->profileimage != '' || $user->profileimage != null)
                        <img alt="profile image" src="{{ url('/images/admin/usersprofileimage/'.$user->profileimage) }}"
                            class="avatar-lg rounded-circle" />
                        @else
                        <img alt="profile image"
                            src="{{ url('/images/admin/generalsettings/'.$generalsetting->profile_placeholder) }}"
                            class="avatar-lg rounded-circle" />
                        @endif
                        <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                            <h6 class="mb-0 text-white">{{ $user->name }}</h6>
                            <p class="text-white mb-0">Member Since {{ $user->created_at->format('M Y') }}</p>
                        </div>
                    </div>
                </div>
                <div class="widget settings-menu">
                    <ul role="tablist" class="nav nav-tabs">
                        <li class="nav-item current">
                            <a href="{{route('userdashboard')}}" class="nav-link">
                                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="nav-item current">
                            <a href="{{route('userbookings')}}" class="nav-link active">
                                <i class="far fa-calendar-check"></i>
                                <span>My Bookings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('usersettings', $user->id)}}" class="nav-link">
                                <i class="far fa-user"></i> <span>Profile Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('userwallet')}}" class="nav-link">
                                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{route('userreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('userpayment')}}" class="nav-link">
                                <i class="fas fa-hashtag"></i> <span>Payment</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('user.changepassword', $user->id)}}" class="nav-link">
                                <i class="fas fa-key"></i> <span>Change Password</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8 bookinglist">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h4 class="widget-title mb-0">My Bookings</h4>
                    </div>
                    <div class="col-auto">
                        <div class="sort-by">
                            <select class="form-control-sm custom-select">
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

                @foreach ($userbookings as $userbooking)
                <div class="bookings">
                    <div class="booking-list">
                        <div class="booking-widget">
                            <a href="#" class="booking-img">
                                @if($userbooking->service->serviceimage ?? '')
                                <img src="{{ url('/images/admin/serviceimage/' . $userbooking->service->serviceimage) }}"
                                    alt="Service Image" />
                                @else
                                <img src="{{ url('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                    alt="Service Image" />
                                @endif
                            </a>
                            <div class="booking-det-info">
                                <h3>
                                    <a href="#">{{ $userbooking->service->servicetitle ?? ''}}</a>
                                </h3>
                                <ul class="booking-details">
                                    <li>
                                        <span>Booking Date</span> {{ $userbooking->service_date }}
                                    </li>
                                    <li><span>Booking time</span> {{ $userbooking->service_timeslot }}</li>
                                    <li><span>Amount</span> {{ $userbooking->serviceamount }}</li>
                                    <li><span>Location</span> {{ $userbooking->city->cityname }}, {{
                                        $userbooking->city->state->statename }}</li>
                                    <li><span>Phone</span> {{ $userbooking->user->contactno }}</li>
                                    <li>
                                        <span>Provider</span>
                                        {{ $userbooking->service->provider->name ?? ''}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="booking-action">

                            <a href="javascript:;" class="btn btn-sm bg-danger-light"><i class="fas fa-times"></i>
                                Cancel the Service</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="mt-4">
                    {{ $userbookings->links('pagination::bootstrap-5') }}
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
