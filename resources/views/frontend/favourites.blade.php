@extends('frontend.layouts.app')
@section('content')

<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-md-4">
                <div class="mb-4">
                    <div class="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                        <img alt="profile image" src="{{ asset('frontend/assets/img/customer/user-01.jpg') }}" class="avatar-lg rounded-circle" />
                        <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                            <h6 class="mb-0">Kalpesh Omm</h6>
                            <p class="text-muted mb-0">Member Since Apr 2023</p>
                        </div>
                    </div>
                </div>
                <div class="widget settings-menu">
                    <ul role="tablist" class="nav nav-tabs">
                        <li class="nav-item current">
                            <a href="{{route('userdashboard')}}" class="nav-link active">
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
                            <a href="{{route('usersettings')}}" class="nav-link">
                                <i class="far fa-user"></i> <span>Profile Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('userwallet')}}" class="nav-link">
                                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('userreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('userpayment')}}" class="nav-link">
                                <i class="fas fa-hashtag"></i> <span>Payment</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-9 col-md-8">
                <h4 class="widget-title">Favourites</h4>
                <div class="row">
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-01.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹25</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Glass</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Toughened Glass Fitting Services</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <span class="d-inline-block average-rating">(4.3)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-03.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹45</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Electrical</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Electric Panel Repairing Service</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(4.5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-02.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹50</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Automobile</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Car Repair Services</a>
                                </h3>
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
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-04.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹14</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Car Wash</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Steam Car Wash</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(0)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-05.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹100</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Cleaning</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">House Cleaning Services</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(0)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-06.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹45</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Computer</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Computer & Server AMC Service</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(0)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-07.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹5</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Interior</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Interior Designing</a>
                                </h3>
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

                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-08.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹75</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Construction</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Building Construction Services</a>
                                </h3>
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
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="service-widget flex-fill">
                            <div class="service-img">
                                <a href="{{ route('servicedetails')}}">
                                    <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('frontend/assets/img/services/service-09.jpg') }}" />
                                </a>
                                <div class="fav-btn">
                                    <a href="javascript:void(0)" class="fav-icon">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                                <div class="item-info">
                                    <div class="service-user">
                                        <a href="javascript:void(0);">
                                            <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}" alt="" />
                                        </a>
                                        <span class="service-price">₹500</span>
                                    </div>
                                    <div class="cate-list">
                                        <a class="bg-yellow" href="{{ route('servicedetails')}}">Painting</a>
                                    </div>
                                </div>
                            </div>
                            <div class="service-content">
                                <h3 class="title">
                                    <a href="{{ route('servicedetails')}}">Commercial Painting Services</a>
                                </h3>
                                <div class="rating">
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star filled"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="d-inline-block average-rating">(3)</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination Links -->
                    <div class="pagination">
                        <ul>
                            <li class="active">
                                <a href="javascript:void(0);">1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">2</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">3</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">4</a>
                            </li>
                            <li class="arrow">
                                <a href="javascript:void(0);"><i class="fas fa-angle-right"></i></a>
                            </li>
                        </ul>
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
