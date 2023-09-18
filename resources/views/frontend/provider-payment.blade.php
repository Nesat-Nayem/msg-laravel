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
                        {{-- <li class="nav-item">
                            <a href="{{route('providerreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('providerpayment')}}" class="nav-link active">
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
                <h4 class="widget-title payment">Payment History</h4>
                <div class="card transaction-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($list as $payment)
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);">
                                                <img src="{{ asset('frontend/assets/img/services/service-01.jpg') }}"
                                                    class="pro-avatar" alt="" />
                                                {{ $payment->servicetitle ?? '' }}
                                            </a>
                                        </td>
                                        <td>
                                            @if($payment->profileimage != '' || $payment->profileimage !=
                                            null)
                                            <img class="avatar-xs rounded-circle"
                                                src="{{ url('images/admin/usersprofileimage/' . $payment->profileimage) }}"
                                                alt="User Image" />
                                            @else
                                            <img class="avatar-xs rounded-circle"
                                                src="{{ url('images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                                alt="User Image" />
                                            @endif
                                            {{ $payment->name }}
                                        </td>
                                        <td>{{ date('d-m-Y ', strtotime($payment->created_at)) }}</td>
                                        <td><strong>₹{{ $payment->amount }}</strong></td>
                                        <td>
                                            @if($payment->json_response == 'Success')
                                            <span class="badge bg-success-light">Success</span>
                                            @else
                                            <span class="badge bg-danger-light">Failed</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="mt-4">
                            {{ $list->links('pagination::bootstrap-5') }}
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
