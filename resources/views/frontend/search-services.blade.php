@extends('frontend.layouts.app')
@section('content')

    <!-- Breadcrumb -->
    <div class="breadcrumb-bar">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="breadcrumb-title">
                        <h2>Find a Service</h2>
                    </div>
                </div>
                <div class="col-auto float-end ms-auto breadcrumb-menu">
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('index') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Find a Service
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- /Breadcrumb -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 sidebar">
                    <div class="card filter-card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Search Filter</h4>
                            <div id="search_form">
                                <div class="filter-widget">
                                    <form action="{{ route('search.services') }}" method="POST" role="search"
                                        class="searchbox">
                                        @csrf
                                        <div class="filter-list">
                                            <h4 class="filter-title">Keyword</h4>
                                            <input type="text" id="search" name="search" placeholder="Search"
                                                class="form-control" />
                                        </div>
                                        <div class="filter-list">
                                            <h4 class="filter-title">Sort By</h4>
                                            <select name="sort" id="sort"
                                                class="form-control selectbox select form-select">

                                                <option value="">Sort By</option>
                                                <option>Price Low to High</option>
                                                <option>Price High to Low</option>
                                                <option>Newest</option>
                                            </select>
                                        </div>
                                        <div class="filter-list">
                                            <h4 class="filter-title">Categories</h4>
                                            <select name="category_id" id="category_id" class="w-100 form-select">
                                                <option value=""> - - Select Category - -
                                                </option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                        {{ $category->categoryname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="filter-list">
                                            <h4 class="filter-title">Location</h4>
                                            <select name="city_id" id="city_id"
                                                class="w-100 form-select @error('city_id') is-invalid @enderror">
                                                <option value=""> - - Select Location - -
                                                </option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}"
                                                        {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                        {{ $city->cityname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <button class="btn btn-primary pl-5 pr-5 btn-block get_services w-100"
                                            type="submit">
                                            Search
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="row align-items-center mb-4">
                        <div class="col-md-6 col">
                        </div>
                        <div class="col-md-6 col-auto">
                            <div class="view-icons">
                                <a href="javascript:void(0);" class="grid-view active"><i class="fas fa-th-large"></i></a>
                            </div>
                        </div>
                    </div>
                    @isset($categoryService)
                        <div class="row">
                            @foreach ($categoryService as $services)
                                <div class="col-lg-4 col-md-6">
                                    <div class="service-widget">
                                        <div class="service-img">
                                            <a href="{{ route('servicedetails', $services->slug) }}">
                                                @if ($services->image != '' || $services->serviceimage != null)
                                                    <img class="img-fluid serv-img" alt="Service Image"
                                                        src="{{ asset('/images/admin/serviceimage/' . $services->serviceimage) }}"
                                                        style="height: 252.25px; width: 440px;" />
                                                @else
                                                    <img class="img-fluid serv-img" alt="Service Image"
                                                        src="{{ asset('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                        style="height: 252.25px; width: 440px;" />
                                                @endif
                                            </a>
                                            <div class="fav-btn">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="service-user">
                                                    <a href="#">
                                                        @if ($services->provider->profileimage)
                                                            <img src="{{ url('/images/admin/providerprofileimage/' . $services->provider->profileimage) }}"
                                                                alt="provider image" />
                                                        @else
                                                            <img src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                                                alt="provider image" />
                                                        @endif
                                                    </a>
                                                    <span class="service-price">{{ $services->serviceamount }}₹</span>
                                                </div>
                                                <div class="cate-list">
                                                    <a class="bg-yellow"
                                                        href="{{ route('servicedetails', $services->slug) }}">{{ $services->category->categoryname }}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="service-content">
                                            <h3 class="title">
                                                <a
                                                    href="{{ route('servicedetails', $services->slug) }}">{{ $services->servicetitle }}</a>
                                            </h3>
                                            <div class="rating">
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star filled"></i>
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(4.3)</span>
                                            </div>
                                            <div class="user-info">
                                                <div class="row">
                                                    <span class="col-auto ser-contact"><i class="fas fa-phone me-1"></i>
                                                        <span id="mobilenumber">{{ $services->provider->mobilenumber }}</span>
                                                    </span>
                                                    <span class="col ser-location">
                                                        <span>{{ $services->city->cityname }},
                                                            {{ $services->state->statename }}</span>
                                                        <i class="fas fa-map-marker-alt ms-1"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset

                    @if (!isset($categoryService))
                        <div class="row">
                            @foreach ($services as $service)
                                <div class="col-lg-4 col-md-6">
                                    <div class="service-widget">
                                        <div class="service-img">
                                            <a href="{{ route('servicedetails', $service->slug) }}">
                                                @if ($service->image != '' || $service->serviceimage != null)
                                                    <img class="img-fluid serv-img" alt="Service Image"
                                                        src="{{ asset('/images/admin/serviceimage/' . $service->serviceimage) }}"
                                                        style="height: 252.25px; width: 397.51px;" />
                                                @else
                                                    <img class="img-fluid serv-img" alt="Service Image"
                                                        src="{{ asset('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                        style="height: 252.25px; width: 397.51px;" />
                                                @endif
                                            </a>
                                            <div class="fav-btn">
                                                <a href="javascript:void(0)" class="fav-icon">
                                                    <i class="fas fa-heart"></i>
                                                </a>
                                            </div>
                                            <div class="item-info">
                                                <div class="service-user">
                                                    <a href="#">
                                                        @if ($service->provider->profileimage ?? '')
                                                            <img src="{{ url('/images/admin/providerprofileimage/' . $service->provider->profileimage) }}"
                                                                alt="provider image" />
                                                        @else
                                                            <img src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                                                alt="provider image" />
                                                        @endif
                                                    </a>
                                                    <span class="service-price">{{ $service->serviceamount }}₹</span>
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
                                                <i class="fas fa-star"></i>
                                                <span class="d-inline-block average-rating">(4.3)</span>
                                            </div>
                                            <div class="user-info">
                                                <div class="row">
                                                    <span class="col-auto ser-contact"><i class="fas fa-phone me-1"></i>
                                                        <span>{{ $service->provider->mobilenumber }}</span>
                                                    </span>
                                                    <span class="col ser-location">
                                                        <span>{{ $service->city->cityname }},
                                                            {{ $service->state->statename }}</span>
                                                        <i class="fas fa-map-marker-alt ms-1"></i>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
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
