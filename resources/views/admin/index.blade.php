@extends('admin.layouts.app')
@section('head')
<style>
    .link {
        text-decoration: none;
        color: black;
    }

    .link:hover {
        color: #066bb1;
    }
</style>
@endsection
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <h3 class="page-title">Welcome Admin!</h3>
            </div>
        </div>
    </div>
    <!-- /Page Header -->
    @include('toastr')
    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('addadmin.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-user-shield"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $admins->count() }}</h3>
                                <h6 class="text-muted">Admins</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-users.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-users"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $users->count() }}</h3>
                                <h6 class="text-muted">Users</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-provider.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="far fa-user"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $providers->count() }}</h3>
                                <h6 class="text-muted">Providers</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-category.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-layer-group"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $categories->count() }}</h3>
                                <h6 class="text-muted">Categories</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-subcategory.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-layer-group"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $subcategories->count() }}</h3>
                                <h6 class="text-muted">Subcategories</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-service.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-bullhorn"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $services->count() }}</h3>
                                <h6 class="text-muted">Services</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('adminsubscription.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-credit-card"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $subscriptions->count() }}</h3>
                                <h6 class="text-muted">Subscription</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-country.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-globe"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $countries->count() }}</h3>
                                <h6 class="text-muted">Countries</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-state.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-map"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $states->count() }}</h3>
                                <h6 class="text-muted">States</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admin-city.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-city"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $cities->count() }}</h3>
                                <h6 class="text-muted">Cities</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <a href="{{ route('admincontactus.index') }}" class="link">
                <div class="card">
                    <div class="card-body">
                        <div class="dash-widget-header">
                            <span class="dash-widget-icon bg-primary">
                                <i class="fa fa-address-book"></i>
                            </span>
                            <div class="dash-widget-info">
                                <h3>{{ $contactus->count() }}</h3>
                                <h6 class="text-muted">Contact Us List</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col-md-6 d-flex">
                <!-- Recent Bookings -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Recent Bookings</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center">
                                <thead>
                                    <tr>
                                        <th>Customer</th>
                                        <th>Date</th>
                                        <th>Service</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->user->name }}</td>
                                        <td>{{ $booking->created_at->format('d M Y') }}</td>
                                        <td>{{ $booking->service->servicetitle }}</td>
                                        <td>Pending</td>
                                        <td>{{ $booking->serviceamount }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /Recent Bookings -->
            </div>
            <div class="col-md-6 d-flex">
                <!-- Payments -->
                <div class="card card-table flex-fill">
                    <div class="card-header">
                        <h4 class="card-title">Payments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-center">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>User</th>
                                        <th>Provider</th>
                                        <th>Service</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $payment->created_at->format('d M Y') }}</td>
                                        <td>
                                            <span class="table-avatar">
                                                <a href="#" class="avatar avatar-xs me-2">
                                                    @if($payment->user->profileimage != '' ||
                                                    $payment->user->profileimage != null)
                                                    <img class="avatar-img rounded-circle" alt=""
                                                        src="{{ url('images/admin/usersprofileimage/' . $payment->user->profileimage) }} " />
                                                    @else
                                                    <img class="avatar-img rounded-circle" alt=""
                                                        src="{{ url('images/admin/generalsettings/' . $generalsetting->profile_placeholder) }} " />
                                                    @endif
                                                </a>
                                                <a href="javascript:void(0);">{{ $payment->user->name }}</a>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="table-avatar">
                                                <a href="#" class="avatar avatar-xs me-2">
                                                    @if($payment->service->provider->profileimage != '' ||
                                                    $payment->service->provider->profileimage != null)
                                                    <img class="avatar-img rounded-circle" alt=""
                                                        src="{{ url('images/admin/providerprofileimage/' . $payment->service->provider->profileimage) }}" />
                                                    @else
                                                    <img class="avatar-img rounded-circle" alt=""
                                                        src="{{ url('images/admin/providerprofile/' . $generalsetting->profile_placeholder) }}" />
                                                    @endif
                                                </a>
                                                <a href="javascript:void(0);">{{ $payment->service->provider->name
                                                    }}</a>
                                            </span>
                                        </td>
                                        <td>{{ $payment->service->servicetitle }}</td>
                                        <td>₹{{ $payment->amount }}</td>
                                        <td>
                                            @if($payment->json_response == 'Success')
                                            <span class="badge badge-success">Success</span>
                                            @elseif($payment->json_response == 'Failed')
                                            <span class="badge badge-danger">Pending</span>
                                            @else
                                            <span class="badge badge-dark">Pending</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Payments -->
            </div>
        </div>
    </div>
    @endsection
