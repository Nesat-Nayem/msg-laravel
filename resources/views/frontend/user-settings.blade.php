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
        @include('toastr')
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-4 sidebar pt-3">
                    <div class="mb-4">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                            @if ($user->profileimage != '' || $user->profileimage != null)
                                <img alt="profile image"
                                    src="{{ url('/images/admin/usersprofileimage/' . $user->profileimage) }}"
                                    class="avatar-lg rounded-circle" />
                            @else
                                <img alt="profile image"
                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
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
                                <a href="{{ route('userdashboard') }}" class="nav-link">
                                    <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                                </a>
                            </li>

                            <li class="nav-item current">
                                <a href="{{ route('userbookings') }}" class="nav-link">
                                    <i class="far fa-calendar-check"></i>
                                    <span>My Bookings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('usersettings', $user->id) }}" class="nav-link active">
                                    <i class="far fa-user"></i> <span>Profile Settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('userwallet') }}" class="nav-link">
                                    <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                            <a href="{{route('userreviews')}}" class="nav-link">
                                <i class="far fa-star"></i> <span>Reviews</span>
                            </a>
                        </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('userpayment') }}" class="nav-link">
                                    <i class="fas fa-hashtag"></i> <span>Payment</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('user.changepassword', $user->id) }}" class="nav-link">
                                    <i class="fas fa-key"></i> <span>Change Password</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <div class="tab-content pt-0">
                        <div class="tab-pane show active" id="user_profile_settings">
                            <div class="widget">
                                <h4 class="widget-title usersetting">Profile Settings</h4>
                                <form action="{{ route('usersettings.update', $user->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <h5 class="form-title">Basic Information</h5>
                                        </div>
                                        <div class="form-group col-xl-12">
                                            <div class="media align-items-center mb-3 d-flex">
                                                @if ($user->profileimage != '' || $user->profileimage != null)
                                                    <img class="user-image"
                                                        src="{{ url('/images/admin/usersprofileimage/' . $user->profileimage) }}"
                                                        alt="User Image" />
                                                @else
                                                    <img class="user-image"
                                                        src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                                        alt="User Image" />
                                                @endif
                                                <div class="media-body">
                                                    <h5 class="mb-0">{{ $user->name }}</h5>
                                                    <p>Max file size is 2MB</p>
                                                    <label for="profileimage"
                                                        class="btn btn-primary btn-block btn-outlined">Browse</label>
                                                    <input type="file" id="profileimage"
                                                        class="@error('profileimage') is-invalid @enderror"
                                                        name="profileimage" accept="image/*" style="display: none">
                                                    @error('profileimage')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">

                                        @method('PUT')
                                        <div class="row">
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Name</label>
                                                <input class="form-control @error('name') is-invalid @enderror"
                                                    id="name" value="{{ $user->name }}" placeholder="Enter Name"
                                                    type="text" readonly />
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    id="email" type="email" placeholder="Enter Email Address"
                                                    value="{{ $user->email }}" readonly />
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Country Code</label>
                                                <input class="form-control @error('countrycode') is-invalid @enderror"
                                                    id="countrycode" type="text" value="{{ $user->countrycode }}"
                                                    placeholder="Enter Country Code" readonly />
                                                @error('countrycode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Mobile Number</label>
                                                <input
                                                    class="form-control no_only @error('contactno') is-invalid @enderror"
                                                    id="contactno" type="text" min="0"
                                                    onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                    pattern="[6-9]{1}[0-9]{9}" value="{{ $user->contactno }}"
                                                    placeholder="Enter Mobile Number" readonly />
                                                @error('contactno')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Date of birth</label>
                                                <input type="date"
                                                    class="form-control @error('dob') is-invalid @enderror" id="dob"
                                                    name="dob" placeholder="Enter Date of birth" autocomplete="off"
                                                    name="dob" value="{{ $user->dob }}" />
                                                @error('dob')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="col-xl-12">
                                                <h5 class="form-title">Address</h5>
                                            </div>
                                            <div class="form-group col-xl-12">
                                                <label class="me-sm-2 text-black">Address</label>
                                                <textarea name="address" id="address" class="form-control @error('address') is-invalid @enderror"
                                                    placeholder="Enter Address">{{ $user->address }}</textarea>
                                                @error('address')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Country</label>
                                                <select name="country_id" id="country_id"
                                                    onchange="getStates('country_id','state_id','city_id');"
                                                    class="w-100 form-select @error('country_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select Country - -
                                                    </option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            @if ($user->country_id == $country->id) selected @endif>
                                                            {{ $country->countryname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('country_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">State</label>
                                                <select name="state_id" id="state_id"
                                                    onchange="getCities('state_id', 'city_id');"
                                                    class="w-100 form-select @error('state_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select State - -
                                                    </option>
                                                    @foreach ($states as $state)
                                                        @if ($user->state_id == $state->id)
                                                            <option value="{{ $state->id }}" selected>
                                                                {{ $state->statename }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('state_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">City</label>
                                                <select name="city_id" id="city_id"
                                                    class="w-100 form-select @error('city_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select City -
                                                        -
                                                    </option>
                                                    @foreach ($cities as $city)
                                                        @if ($user->city_id == $city->id)
                                                            <option value="{{ $city->id }}" selected>
                                                                {{ $city->cityname }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('city_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-6">
                                                <label class="me-sm-2 text-black">Postal Code</label>
                                                <input type="text"
                                                    class="form-control @error('postalcode') is-invalid @enderror"
                                                    name="postalcode" placeholder="Enter Postal Code"
                                                    value="{{ $user->postalcode }}" />
                                                @error('postalcode')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group col-xl-12">
                                                <button id="form_submit" class="btn btn-primary ps-5 pe-5"
                                                    type="submit">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

    <script>
        function getStates(country_id, state_id, city_id) {
            var country = document.getElementById(country_id).value;
            var StateField = document.getElementById(state_id);
            var CityField = document.getElementById(city_id);
            if (country) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/getStateFromCountry') }}/" + country,
                    success: function(data) {
                        StateField.options.length = 0;
                        $(StateField).append(
                            '<option value=""> - - Select State - - </option>');

                        CityField.options.length = 0;
                        $(CityField).append(
                            '<option value=""> - - Select City - - </option>');

                        for (var i in data) {
                            $(StateField).append('<option value=' + data[i].id + '>' + data[i]
                                .statename + '</option>');
                        }
                    }
                });
            } else {
                StateField.options.length = 0;
                $(StateField).append(
                    '<option value=""> - - Select State - - </option>');

                CityField.options.length = 0;
                $(CityField).append(
                    '<option value=""> - - Select City - - </option>');
            }
        }

        function getCities(state_id, city_id) {
            var state = document.getElementById(state_id).value;
            var CityField = document.getElementById(city_id);
            if (state) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/getCityFromState') }}/" + state,
                    success: function(data) {
                        CityField.options.length = 0;
                        $(CityField).append(
                            '<option value=""> - - Select City - - </option>');

                        for (var i in data) {
                            $(CityField).append('<option value=' + data[i].id + '>' + data[i]
                                .cityname + '</option>');
                        }
                    }
                });
            } else {
                CityField.options.length = 0;
                $(CityField).append(
                    '<option value=""> - - Select City - - </option>');
            }
        }
    </script>
@endsection
