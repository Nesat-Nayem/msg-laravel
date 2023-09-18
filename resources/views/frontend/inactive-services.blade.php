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
                                <a href="{{ route('myservices') }}" class="nav-link active">
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
                            <li class="nav-item">
                                <a href="{{ route('providerwallet') }}" class="nav-link">
                                    <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                                </a>
                            </li>
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
                            <li class="nav-item">
                                <a href="{{ route('providerreviews') }}" class="nav-link">
                                    <i class="far fa-star"></i> <span>Reviews</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providerpayment') }}" class="nav-link">
                                    <i class="fas fa-hashtag"></i> <span>Payment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <h4 class="widget-title service">My Services</h4>
                    <ul class="nav nav-tabs menu-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myservices') }}">Active Services</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('inactive.services') }}">Inactive Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('addservice') }}">Add Service</a>
                        </li>


                    </ul>

                    <div class="row">
                        @foreach ($services as $service)
                            <div class="col-lg-4 col-md-6 d-flex">
                                <div class="service-widget flex-fill">
                                    <div class="service-img">
                                        <a href="{{ route('servicedetails', $service->slug) }}">
                                            @if ($service->image != '' || $service->serviceimage != null)
                                                <img class="img-fluid serv-img serviceimg" alt="Service Image"
                                                    src="{{ asset('/images/admin/serviceimage/' . $service->serviceimage) }}"
                                                    style="height:183.62px; width: 274.21px;" />
                                            @else
                                                <img class="img-fluid serv-img serviceimg" alt="Service Image"
                                                    src="{{ asset('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                    style="height:183.62px; width: 274.21px;" />
                                            @endif
                                        </a>
                                        <div class="item-info">
                                            <div class="service-user">
                                                <a href="javascript:void(0);">
                                                    <img src="{{ asset('frontend/assets/img/provider/provider-01.jpg') }}"
                                                        alt="" />
                                                </a>
                                                <span class="service-price">{{ $service->serviceamount }}</span>
                                            </div>
                                            <div class="cate-list">
                                                <a class="bg-yellow"
                                                    href="{{ route('servicedetails', $service->slug) }}">{{ $service->category->categoryname }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h3 class="title">
                                            <a
                                                href="{{ route('servicedetails', $service->slug) }}">{{ $service->servicetitle }}</a>
                                        </h3>
                                        <div class="rating">
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <i class="fas fa-star filled"></i>
                                            <span class="d-inline-block average-rating">(4.3)</span>
                                        </div>
                                        <div class="user-info">
                                            <div class="service-action">
                                                <div class="row">
                                                    <div class="col">
                                                        <a href="{{ route('editservice', $service->slug) }}"
                                                            class="text-success"><i class="far fa-edit"></i> Edit</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div>{{ $services->links('pagination::bootstrap-5') }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Inactive Service?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">
                        OK
                    </button>
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
