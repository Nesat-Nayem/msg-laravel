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
                            <a href="{{ route('providerdashboard') }}" class="nav-link">
                                <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('myservices') }}" class="nav-link">
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
                        {{-- <li class="nav-item">
                            <a href="{{ route('providerwallet') }}" class="nav-link">
                                <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('providersubscription') }}" class="nav-link">
                                <i class="far fa-calendar-alt"></i>
                                <span>Subscription</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('provideravailability') }}" class="nav-link active">
                                <i class="far fa-clock"></i> <span>Availability</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="{{ route('providerreviews') }}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="{{ route('providerpayment') }}" class="nav-link">
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
            <div class="col-xl-9 col-md-8 availability">
                <div class="card mb-0">
                    <div class="card-body">
                        <form action="{{ route('provideravailability.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <p>Availability <span class="text-danger">*</span></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table availability-table">
                                                <tbody>
                                                    <tr>
                                                        <td class="all">
                                                            <input type="checkbox" class="me-1 check" id="chk"
                                                                name="chk" onClick="readonly();" /> All
                                                            Days
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">

                                                                <input type="time" name="from_time[]">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" name="to_time[]">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Monday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Tuesday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Wednesday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Thursday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Friday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Saturday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <input type="checkbox" class="me-1 check time" name="chk" />
                                                            Sunday
                                                        </td>
                                                        <td class="w-180">
                                                            From time
                                                            <span class="time-select mb-1">
                                                                <input type="time" class="time" name="from_time[]"
                                                                    id="from_time">
                                                            </span>
                                                        </td>
                                                        <td class="w-155">
                                                            To time
                                                            <span class="time-select">
                                                                <input type="time" class="time" name="to_time[]"
                                                                    id="to_time">
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="submit-section text-end">
                                <button class="btn btn-primary submit-btn" type="submit">
                                    Submit
                                </button>
                            </div>
                        </form>
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

<script>
    function toggleCheckbox(isChecked) {
        if (isChecked) {
            $('input[name="chk"]').each(function() {
                this.checked = true;
            });
        } else {
            $('input[name="chk"]').each(function() {
                this.checked = false;
            });
        }
    }

    function readonly() {
        // chk = document.getElementById('chk').value;
        // alert(chk);
        if (document.getElementById("chk").checked) {
            // document.getElementByName("to_time[]").disabled = true;
            $('.time').attr('disabled', true);
        }
        else{
            $('.time').attr('disabled', false);
        }
    }

</script>
@endsection
