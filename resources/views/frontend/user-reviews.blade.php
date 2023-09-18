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
                            <a href="{{route('userbookings')}}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{route('userreviews')}}" class="nav-link active">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li>
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
            <div class="col-xl-9 col-md-8">
                <h4 class="widget-title">Reviews</h4>
                <div class="card review-card mb-0">
                    <div class="card-body">
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-10.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Air Conditioner Service</a></h5>
                                <div class="review-date">July 11, 2020 11:38 am</div>
                                <p class="mb-2">Good Work</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                    Vishal Mishra
                                </div>
                            </div>
                            <div class="review-count">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-rating">(5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-13.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Wooden Carpentry Work</a></h5>
                                <div class="review-date">July 05, 2020 15:33 pm</div>
                                <p class="mb-2">Best Work</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                    Matthew Garcia
                                </div>
                            </div>
                            <div class="review-count">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-rating">(5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-10.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Plumbing Services</a></h5>
                                <div class="review-date">June 29, 2020 05:04 am</div>
                                <p class="mb-2">Excellent Service</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                    Yolanda Potter
                                </div>
                            </div>
                            <div class="review-count">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(4)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-09.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Commercial Painting Services</a></h5>
                                <div class="review-date">June 26, 2020 02:22 am</div>
                                <p class="mb-2">Thanks</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                    Ricardo Flemings
                                </div>
                            </div>
                            <div class="review-count">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-rating">(5)</span>
                                </div>
                            </div>
                        </div>
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-08.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Building Construction Services</a></h5>
                                <div class="review-date">June 13, 2020 17:38 pm</div>
                                <p class="mb-2">Amazing</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                    Maritza Wasson
                                </div>
                            </div>
                            <div class="review-count">
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(4)</span>
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
