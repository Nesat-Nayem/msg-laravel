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

    label {
        color: #000
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
                            <a href="{{ route('providersettings', $provider->id) }}" class="nav-link active">
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
                <div>
                    <div class="widget">
                        <h4 class="widget-title providersetting">Profile Settings</h4>
                        <form action="{{ route('providersettings.update', $provider->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xl-12">
                                    <h5 class="form-title">Basic Information</h5>
                                </div>
                                <div class="form-group col-xl-12">
                                    <div class="media align-items-center mb-3 d-flex">
                                        @if($provider->profileimage != '' || $provider->profileimage != null)
                                        <img class="user-image"
                                            src="{{ url('/images/admin/providerprofileimage/' . $provider->profileimage) }}"
                                            alt="Provider Image" />
                                        @else
                                        <img class="user-image"
                                            src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                            alt="User Image" />
                                        @endif
                                        <div class="media-body">
                                            <h5 class="mb-0">{{ $provider->name }}</h5>
                                            <p>Max file size is 2MB</p>
                                            <label for="profileimage"
                                                class="btn btn-primary btn-block btn-outlined">Browse</label>
                                            <input type="file" id="profileimage"
                                                class="@error('profileimage') is-invalid @enderror" name="profileimage"
                                                accept="image/*" style="display: none">
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
                                <div class="row">
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Name</label>
                                        <input value="{{ $provider->name }}" type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Enter Name" readonly>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Email</label>
                                        <input value="{{ $provider->email }}" type="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            placeholder="Enter Email" readonly>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Country Code</label>
                                        <input value="{{ $provider->countrycode }}" type="text"
                                            class="form-control @error('countrycode') is-invalid @enderror"
                                            id="countrycode" placeholder="Enter Country Code" readonly>
                                        @error('countrycode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Mobile Number</label>
                                        <input value="{{ $provider->mobilenumber }}" type="text" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[6-9]{1}[0-9]{9}"
                                            class="form-control @error('mobilenumber') is-invalid @enderror"
                                            id="mobilenumber" placeholder="Enter Mobile Number" readonly>
                                        @error('mobilenumber')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Date of birth</label>
                                        <input value="{{ $provider->dob }}" type="date"
                                            class="form-control @error('dob') is-invalid @enderror" name="dob" id="dob"
                                            placeholder="Enter Date of Birth">
                                        @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <h5 class="form-title">Service Info</h5>
                                    </div>
                                    <div class="form-group col-xl-6 mt-2">
                                        <label class="me-sm-2">Category</label>
                                        <select name="category_id" id="category_id"
                                            class="w-100 form-select @error('category_id') is-invalid @enderror"
                                            required onchange="getSubCategory('category_id', 'subcategory_id');">
                                            <option value=""> - - Select Category - -
                                            </option>
                                            @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" @if ($provider->category_id ==
                                                $category->id) selected @endif>
                                                {{ $category->categoryname }}
                                            </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-xl-6 mt-2">
                                        <label class="me-sm-2">Sub Category</label>
                                        <select name="subcategory_id" id="subcategory_id"
                                            class="w-100 form-select required @error('subcategory_id') is-invalid @enderror">
                                            <option value=""> - - Select Sub Category - - </option>
                                            @foreach ($subcategories as $subcategory)
                                            @if ($provider->subcategory_id == $subcategory->id)
                                            <option value="{{ $subcategory->id }}" selected>
                                                {{ $subcategory->subcategoryname }}
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('subcategory_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <h5 class="form-title">Address</h5>
                                    </div>
                                    <div class="form-group col-xl-12 mt-2">
                                        <label class="me-sm-2">Address</label>
                                        <textarea class="form-control @error('address') is-invalid @enderror"
                                            name="address" id="address" placeholder="Enter Address"
                                            required>{{ $provider->address }}</textarea>
                                    </div>
                                    <div class="form-group col-xl-6">
                                        <label class="me-sm-2">Country</label>
                                        <select name="country_id" id="country_id"
                                            onchange="getStates('country_id','state_id','city_id');"
                                            class="w-100 form-select @error('country_id') is-invalid @enderror"
                                            required>
                                            <option value=""> - - Select Country - -
                                            </option>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}" @if ($provider->country_id ==
                                                $country->id) selected @endif>
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
                                        <label class="me-sm-2">State</label>
                                        <select name="state_id" id="state_id"
                                            onchange="getCities('state_id', 'city_id');"
                                            class="w-100 form-select @error('state_id') is-invalid @enderror" required>
                                            <option value=""> - - Select State - -
                                            </option>
                                            @foreach ($states as $state)
                                            @if ($provider->state_id == $state->id)
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
                                        <label class="me-sm-2">City</label>
                                        <select name="city_id" id="city_id"
                                            class="w-100 form-select @error('city_id') is-invalid @enderror" required>
                                            <option value=""> - - Select City -
                                                -
                                            </option>
                                            @foreach ($cities as $city)
                                            @if ($provider->city_id == $city->id)
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
                                        <label class="me-sm-2">Postal Code</label>
                                        <input value="{{ $provider->postalcode }}" type="text"
                                            class="form-control @error('postalcode') is-invalid @enderror"
                                            name="postalcode" id="postalcode" placeholder="Enter Postal Code" required>
                                        @error('postalcode')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="col-xl-12">
                                        <h5 class="form-title">About</h5>
                                    </div>
                                    <div class="form-group col-xl-12 mt-2">
                                        <label class="me-sm-2">About</label>
                                        <textarea class="form-control @error('about') is-invalid @enderror" name="about"
                                            id="about" placeholder="Enter about"
                                            required>{{ $provider->about }}</textarea>
                                    </div>
                                    <div class="form-group col-xl-12">
                                        <button class="btn btn-primary ps-5 pe-5" type="submit">
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
                type: "GET"
                , url: "{{ url('/getStateFromCountry') }}/" + country
                , success: function(data) {
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
                type: "GET"
                , url: "{{ url('/getCityFromState') }}/" + state
                , success: function(data) {
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

    function getSubCategory(category_id, subcategory_id) {
        var category = document.getElementById(category_id).value;
        var SubCategoryField = document.getElementById(subcategory_id);
        if (category) {
            $.ajax({
                type: "GET"
                , url: "{{ url('/getSubCategoryFromCategory') }}/" + category
                , success: function(data) {
                    SubCategoryField.options.length = 0;
                    $(SubCategoryField).append('<option value=""> - - Select Sub Category - - </option>');
                    for (var i in data) {
                        $(SubCategoryField).append('<option value=' + data[i].id + '>' + data[i]
                            .subcategoryname + '</option>');
                    }
                }
            });
        } else {
            SubCategoryField.options.length = 0;
            $(SubCategoryField).append('<option value=""> - - Select Sub Category - - </option>');
        }
    }

</script>
@endsection
