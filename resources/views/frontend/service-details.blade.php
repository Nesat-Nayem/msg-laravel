@extends('frontend.layouts.app')
@section('head')
    <style>
        strike {
            font-weight: 100 !important;
            font-size: 25px;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        @include('toastr')
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="service-view">
                        <div class="service-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1>{{ $service->servicetitle }} Services</h1>
                                <div class="fav-btn fav-btn-big">
                                    <a href="javascript:void(0)" class="fav-icon with-border">
                                        <i class="fas fa-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <address class="service-location">
                                <i class="fas fa-location-arrow"></i> {{ $service->city->cityname }},
                                {{ $service->state->statename }}
                            </address>
                            <div class="rating">
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <i class="fas fa-star filled"></i>
                                <span class="d-inline-block average-rating">(5)</span>
                            </div>
                            <div class="service-cate">
                                <a href="">{{ $service->category->categoryname }}</a>
                            </div>
                        </div>
                        <div class="service-images ">
                            <div class=" ">
                                <div class="item">
                                    @if ($service->serviceimage != '' || $service->serviceimage != null)
                                        <img src="{{ asset('/images/admin/serviceimage/' . $service->serviceimage) }}"
                                            alt="" class="img-fluid" />
                                    @else
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="service-details">
                            <ul class="nav nav-pills service-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-overview-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-overview" role="tab" aria-controls="pills-overview"
                                        aria-selected="true">Overview</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-serviceoffered-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-serviceoffered" role="tab"
                                        aria-controls="pills-serviceoffered" aria-selected="false">Services Offered</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-about-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-about" role="tab" aria-controls="pills-about"
                                        aria-selected="false">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-servicegallery-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-servicegallery" role="tab"
                                        aria-controls="pills-servicegallery" aria-selected="false">Gallery</a>
                                </li>
                                {{-- <li class="nav-item">
                                <a class="nav-link" id="pills-reviews-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-reviews" role="tab" aria-controls="pills-reviews"
                                    aria-selected="false">Reviews</a>
                            </li> --}}
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                                    aria-labelledby="pills-overview-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <h5 class="card-title">Service Details</h5>
                                            <p class="mb-0">
                                                {!! $service->description !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pills-serviceoffered" role="tabpanel"
                                    aria-labelledby="pills-serviceoffered-tab">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Services Offered</h5>
                                            <div class="service-offer">
                                                {{ $service->serviceoffer }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pills-about" role="tabpanel" aria-labelledby="pills-about-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <h5 class="card-title">About Us</h5>
                                            <p class="mb-0">
                                                {{ $service->provider->about }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="pills-servicegallery" role="tabpanel"
                                    aria-labelledby="pills-servicegallery-tab">
                                    <div class="card service-description">
                                        <div class="card-body">
                                            <h5 class="card-title">Gallery</h5>
                                            <div class="row">
                                                @if ($service->service_gallery ?? '')
                                                    @foreach (json_decode($service->service_gallery, true) as $gallery)
                                                        <div class="col-md-2 col-12 mb-3">
                                                            <img src="{{ asset('/images/admin/servicegallery/' . $gallery) }}"
                                                                alt="Service Gallery" style="width: 100%; height:100px;">
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="tab-pane fade" id="pills-reviews" role="tabpanel"
                                aria-labelledby="pills-reviews-tab">
                                <div class="card review-box">
                                    <div class="card-body">
                                        <div class="review-list">
                                            <div class="review-img">
                                                <img class="rounded-circle"
                                                    src="{{ asset('frontend/assets/img/customer/user-01.jpg') }}"
                                                    alt="" />
                                            </div>
                                            <div class="review-info">
                                                <h5>Kalpesh Omm</h5>
                                                <div class="review-date">
                                                    August 06, 2020 20:07 pm
                                                </div>
                                                <p class="mb-0">Good Work</p>
                                            </div>
                                            <div class="review-count">
                                                <div class="rating">
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <i class="fas fa-star filled"></i>
                                                    <span class="d-inline-block average-rating">(5.0)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <h4 class="card-title">Related Services</h4>
                </div>
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget widget">
                        <div class="service-amount text-center">
                            @if (Auth::guard('providerpanel')->check())
                                <span>₹{{ $service->serviceamount }}</span>
                            @elseif($service->totalamount)
                                @if ($service->discount != '' || $service->discount != null)
                                    @if ($service->rate == '' || $service->rate == null)
                                        <span>₹{{ $service->totalamount }}</span>
                                    @else
                                        <span>₹{{ $service->rate }}</span>
                                        <span><strike>₹{{ $service->totalamount }}</strike></span>
                                        <span class="text-danger fs-4">({{ $service->discount }}% OFF)</span>
                                    @endif
                                @else
                                    <span>₹{{ $service->totalamount }}</span>
                                @endif
                            @else
                                @if ($service->discount != '' || $service->discount != null)
                                    @if ($service->rate == '' || $service->rate == null)
                                        <span>₹{{ $service->serviceamount }}</span>
                                    @else
                                        <span>₹{{ $service->rate }}</span>
                                        <span><strike>₹{{ $service->serviceamount }}</strike></span>
                                        <span class="text-danger fs-4">({{ $service->discount }}% OFF)</span>
                                    @endif
                                @else
                                    <span>₹{{ $service->serviceamount }}</span>
                                @endif
                            @endif
                        </div>
                        <div class="service-book">
                            @if (Auth::guard('web')->check())
                                <a href="{{ route('bookservice', $service->slug) }}" class="btn btn-primary">
                                    Book Service
                                </a>
                            @elseif(Auth::guard('providerpanel')->check())
                                @if ($service->provider_id == Auth::guard('providerpanel')->user()->id)
                                    <a href="{{ route('editservice', $service->slug) }}" class="btn btn-primary">
                                        Edit Service
                                    </a>
                                @else
                                @endif
                            @else
                                <form action="{{ route('user.logincheck', $service->slug) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="temp" id="temp" value="{{ $service->slug }}">
                                    <button type="submit" class="btn btn-primary">Book Service</button>
                                </form>
                            @endif
                        </div>
                    </div>
                    <div class="card provider-widget clearfix">
                        <div class="card-body">
                            <h5 class="card-title">Service Provider</h5>
                            <div class="about-author">
                                <div class="about-provider-img">
                                    <div class="provider-img-wrap">
                                        <a href="javascript:void(0);">
                                            @if ($service->provider->profileimage)
                                                <img class="img-fluid rounded-circle" alt=""
                                                    src="{{ url('/images/admin/providerprofileimage/' . $service->provider->profileimage) }}">
                                            @else
                                                <img class="img-fluid rounded-circle" alt=""
                                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}" />
                                            @endif
                                        </a>
                                    </div>
                                </div>
                                <div class="provider-details">
                                    <a href="javascript:void(0);"
                                        class="ser-provider-name">{{ $service->provider->name }}</a>
                                    <p class="text-muted mb-1">Member Since
                                        {{ $service->provider->created_at->format('M Y') }}</p>
                                </div>
                            </div>
                            <hr />
                            <div class="provider-info">
                                <p class="mb-1">
                                    <i class="far fa-envelope"></i>
                                    <a href="#">
                                        @isset($bookservice)
                                            <span>{{ $service->provider->email }}</span>
                                        @endisset
                                        @if (!isset($bookservice))
                                            <span>[ email protected ]</span>
                                        @endif
                                    </a>
                                </p>
                                <p class="mb-0">
                                    <i class="fas fa-phone-alt"></i>
                                    @isset($bookservice)
                                        <span>{{ $service->provider->mobilenumber }}</span>
                                    @endisset
                                    @if (!isset($bookservice))
                                        <span id="mobilenumber">{{ $service->provider->mobilenumber }}</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card available-widget">
                        <div class="card-body">
                            <h5 class="card-title">Service Availability</h5>
                            @if ($service->provider->from_time != null)
                                <div class="row">
                                    <div class="col-md-6 col-6 text-end pe-1">
                                        @foreach (json_decode($service->provider->from_time) as $key => $fromtime)
                                            {{ $fromtime ?? '' }} <br>
                                        @endforeach
                                    </div>
                                    <div class="col-md-6 col-6 ps-0">
                                        @foreach (json_decode($service->provider->to_time) as $key => $totime)
                                            - {{ $totime ?? '' }} <br>
                                        @endforeach
                                    </div>
                                </div>
                            @else
                                <div>Not yet specified</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var input = $('#mobilenumber').html();
            input = input.replace(/^(\d{0,4})(\d{0,3})/, '$1 $2')
            var prefix = input.substr(0, input.length - 4);
            var suffix = input.substr(-4);
            var masked = prefix.replace(/\d/g, '*');
            var a = masked + suffix;
            $('#mobilenumber').html(a);
        });
    </script>
@endsection
