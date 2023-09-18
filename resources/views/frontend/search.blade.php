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
                            <a href="{{ route('index')}}">Home</a>
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
            <div class="col-lg-3 theiaStickySidebar">
                <div class="card filter-card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Search Filter</h4>
                        <div id="search_form">
                            <div class="filter-widget">
                                <form action="{{ route('search.services') }}" method="POST" role="search" class="searchbox">
                                    @csrf
                                    <div class="filter-list">
                                        <h4 class="filter-title">Keyword</h4>
                                        <input type="text" id="search" name="search" placeholder="Search" class="form-control" />
                                    </div>
                                    <div class="filter-list">
                                        <h4 class="filter-title">Sort By</h4>
                                        <select class="form-control selectbox select form-select">
                                            <option>Sort By</option>
                                            <option>Price Low to High</option>
                                            <option>Price High to Low</option>
                                            <option>Newest</option>
                                        </select>
                                    </div>
                                    <div class="filter-list">
                                        <h4 class="filter-title">Categories</h4>
                                        <select class="form-control form-control selectbox select form-select">
                                            <option>All Categories</option>
                                            <option>Hostel</option>
                                            <option selected="">Institute</option>
                                            <option>Sports</option>

                                        </select>
                                    </div>
                                    <div class="filter-list">
                                        <h4 class="filter-title">Location</h4>
                                        <select name="city_id" id="city_id" class="w-100 form-select @error('city_id') is-invalid @enderror">
                                            <option value=""> - - Select Location - -
                                            </option>
                                            @foreach ($cities as $city)
                                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
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
                                    <button class="btn btn-primary pl-5 pr-5 btn-block get_services w-100" type="submit">
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
                <div>
                    <div class="row">
                        @foreach ($services as $service)
                        <div class="col-lg-4 col-md-6">
                            <div class="service-widget">
                                <div class="service-img">
                                    <a href="{{ route('servicedetails', $service->slug)}}">
                                        <img class="img-fluid serv-img" alt="Service Image" src="{{ asset('/images/admin/serviceimage/' .$service->serviceimage) }}" />
                                    </a>
                                    <div class="fav-btn">
                                        <a href="javascript:void(0)" class="fav-icon">
                                            <i class="fas fa-heart"></i>
                                        </a>
                                    </div>
                                    <div class="item-info">
                                        <div class="service-user">
                                            <a href="#">
                                                <img src="{{ asset('frontend/assets/img/customer/user-01.jpg') }}" alt="" />
                                            </a>
                                            <span class="service-price">{{ $service->serviceamount }}₹</span>
                                        </div>
                                        <div class="cate-list">
                                            <a class="bg-yellow" href="{{ route('servicedetails', $service->slug)}}">{{ $service->category->categoryname }}</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-content">
                                    <h3 class="title">
                                        <a href="{{ route('servicedetails', $service->slug)}}">{{ $service->servicetitle }}</a>
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
                                                <span>{{ $service->city->cityname }}, {{ $service->state->statename }}</span>
                                                <i class="fas fa-map-marker-alt ms-1"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
<!-- Datepicker Core JS -->
<script src="{{ asset('frontend/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('frontend/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript">
    var route = "{{ url('autocomplete-search') }}";
    $('#search').typeahead({
        source: function(query, process) {
            return $.get(route, {
                query: query
            }, function(data) {
                return process(data);
            });
        }
    });

</script>
@endsection
