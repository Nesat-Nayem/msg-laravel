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
                            <a href="{{route('providerdashboard')}}" class="nav-link">
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
                        <li class="nav-item">
                            <a href="{{route('providerreviews')}}" class="nav-link active">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li>
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
                <h4 class="widget-title">Reviews</h4>
                <div class="card review-card mb-0">
                    <div class="card-body">
                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-08.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Building Construction Services</a></h5>
                                <div class="review-date">July 11, 2020 11:38 am</div>
                                <p class="mb-2">Good Work</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-01.jpg') }}" alt="" />
                                    Kalpesh Omm
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-09.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Commercial Painting Services</a></h5>
                                <div class="review-date">July 05, 2020 15:33 pm</div>
                                <p class="mb-2">Best Work</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-02.jpg') }}" alt="" />
                                    Nancy Olson
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-10.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Plumbing Services</a></h5>
                                <div class="review-date">June 29, 2020 05:04 am</div>
                                <p class="mb-2">Excellent Service</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-03.jpg') }}" alt="" />
                                    Ramona Kingsley
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-11.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Wooden Carpentry Work</a></h5>
                                <div class="review-date">June 26, 2020 02:22 am</div>
                                <p class="mb-2">Thanks</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-04.jpg') }}" alt="" />
                                    Ricardo Lung
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-12.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Air Conditioner Service</a></h5>
                                <div class="review-date">June 13, 2020 17:38 pm</div>
                                <p class="mb-2">Amazing</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-05.jpg') }}" alt="" />
                                    Annette Silva
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-01.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Toughened Glass Fitting Services</a></h5>
                                <div class="review-date">June 10, 2020 17:18 pm</div>
                                <p class="mb-2">Great!</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-06.jpg') }}" alt="" />
                                    Stephen Wilson
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-02.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Car Repair Services</a></h5>
                                <div class="review-date">June 10, 2020 14:25 pm</div>
                                <p class="mb-2">Good Support</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-07.jpg') }}" alt="" />
                                    Ryan Rodriguez
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
                        <!-- /Review -->

                        <!-- Review -->
                        <div class="review-list">
                            <div class="review-img">
                                <img class="rounded img-fluid" src="{{ asset('frontend/assets/img/services/service-03.jpg') }}" alt="" />
                            </div>
                            <div class="review-info">
                                <h5><a href="">Electric Panel Repairing Service</a></h5>
                                <div class="review-date">June 09, 2020 06:13 am</div>
                                <p class="mb-2">Goooodddd!!</p>
                                <div class="review-user">
                                    <img class="avatar-xs rounded-circle" src="{{ asset('frontend/assets/img/customer/user-08.jpg') }}" alt="" />
                                    Lucile Devera
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
                        <!-- /Review -->
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
