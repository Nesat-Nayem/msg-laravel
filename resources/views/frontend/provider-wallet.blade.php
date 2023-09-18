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
                        <li class="nav-item">
                            <a href="{{route('providerwallet')}}" class="nav-link active">
                                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                            </a>
                        </li>
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
                            <a href="{{route('providerreviews')}}" class="nav-link">
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
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Wallet</h4>
                                <div class="wallet-details">
                                    <span>Wallet Balance</span>
                                    <h3>$3885</h3>
                                    <div class="d-flex justify-content-between my-4">
                                        <div>
                                            <p class="mb-1">Total Credit</p>
                                            <h4>₹5314</h4>
                                        </div>
                                        <div>
                                            <p class="mb-1">Total Debit</p>
                                            <h4>₹1431</h4>
                                        </div>
                                    </div>
                                    <div class="wallet-progress-chart">
                                        <div class="d-flex justify-content-between">
                                            <span>₹1431</span>
                                            <span>₹5,314.00</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Withdraw</h4>
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <label class="input-group-text display-5">$</label>
                                            <input type="text" maxlength="4" class="form-control Withdraw-form" placeholder="00.00" />
                                        </div>
                                    </div>
                                </form>
                                <div class="text-center mb-3">
                                    <h5 class="mb-3">OR</h5>
                                    <ul class="list-inline mb-0">
                                        <li class="line-inline-item mb-0 d-inline-block">
                                            <a href="javascript:;" class="updatebtn">₹50</a>
                                        </li>
                                        <li class="line-inline-item mb-0 d-inline-block">
                                            <a href="javascript:;" class="updatebtn">₹100</a>
                                        </li>
                                        <li class="line-inline-item mb-0 d-inline-block">
                                            <a href="javascript:;" class="updatebtn">₹150</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="javascript:void(0);" class="btn btn-primary btn-block withdraw-btn w-100">Withdraw</a>
                            </div>
                        </div>
                    </div>
                </div>

                <h4 class="mb-4">Recent Transactions</h4>
                <div class="card transaction-table mb-0">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center mb-0">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Date</th>
                                        <th>Wallet</th>
                                        <th>Credit</th>
                                        <th>Debit</th>
                                        <th>Available</th>
                                        <th>Reason</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>18 Jul 2020</td>
                                        <td>$3486</td>
                                        <td>$399</td>
                                        <td>$0</td>
                                        <td>$3885</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>14 Jul 2020</td>
                                        <td>$3386</td>
                                        <td>₹100</td>
                                        <td>$0</td>
                                        <td>$3486</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>11 Jul 2020</td>
                                        <td>$3236</td>
                                        <td>₹150</td>
                                        <td>$0</td>
                                        <td>$3386</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>11 Jul 2020</td>
                                        <td>$3211</td>
                                        <td>₹25</td>
                                        <td>$0</td>
                                        <td>$3236</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>11 Jul 2020</td>
                                        <td>$3186</td>
                                        <td>₹25</td>
                                        <td>$0</td>
                                        <td>$3211</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>10 Jul 2020</td>
                                        <td>$3236</td>
                                        <td>$0</td>
                                        <td>$-50</td>
                                        <td>$3186</td>
                                        <td>Withdraw</td>
                                        <td>
                                            <span class="badge bg-danger-light">Debit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>7</td>
                                        <td>09 Jul 2020</td>
                                        <td>$3136</td>
                                        <td>₹100</td>
                                        <td>$0</td>
                                        <td>$3236</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>8</td>
                                        <td>07 Jul 2020</td>
                                        <td>$3036</td>
                                        <td>₹100</td>
                                        <td>$0</td>
                                        <td>$3136</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>9</td>
                                        <td>05 Jul 2020</td>
                                        <td>$3032</td>
                                        <td>$4</td>
                                        <td>$0</td>
                                        <td>$3036</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>10</td>
                                        <td>28 Jun 2020</td>
                                        <td>$3028</td>
                                        <td>$4</td>
                                        <td>$0</td>
                                        <td>$3032</td>
                                        <td>Complete the Service</td>
                                        <td>
                                            <span class="badge bg-success-light">Credit</span>
                                        </td>
                                    </tr>
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
