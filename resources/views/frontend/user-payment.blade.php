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
                        {{-- <li class="nav-item">
                            <a href="{{route('userreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{route('userpayment')}}" class="nav-link active">
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
                <h4 class="widget-title payment">Payment History</h4>
                <div class="card transaction-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Service</th>
                                        <th>Date</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($payments as $payment)
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0);">
                                                @if($payment->service->serviceimage ?? '')
                                                <img src="{{ url('/images/admin/serviceimage/' . $payment->service->serviceimage) }}"
                                                    class="pro-avatar" alt="Service Image" />
                                                @else
                                                <img src="{{ url('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                    class="pro-avatar" alt="Service Image" />
                                                @endif
                                                {{ $payment->service->servicetitle }}
                                            </a>
                                        </td>
                                        <td>{{ $payment->created_at->format('d M Y') }}</td>
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
