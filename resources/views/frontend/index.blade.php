@extends('frontend.layouts.app')
@section('head')
    <style>
        .city {
            border: none;
            border-block: none;
            outline: none;
        }

        .city-group {
            position: relative;
            top: 10px;
        }

        .form-select:focus {
            border-color: none;
            outline: 0;
            box-shadow: none;
        }
    </style>
@endsection
@section('content')
    @include('toastr')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="layer">
            <div class="home-banner"></div>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="section-search aos" data-aos="fade-up">
                            <h3>World's Largest <span>Marketplace</span></h3>
                            <p>Search From 150 Awesome Verified Ads!</p>
                            <div class="search-box">
                                <form action="{{ route('search.service') }}" method="POST" role="search" class="searchbox">
                                    @csrf
                                    <div class="search-input line">
                                        <i class="fas fa-tv bficon"></i>
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" name="search"
                                                placeholder="What are you looking for?" />
                                        </div>
                                    </div>
                                    <div class="search-input">
                                        <div class="form-group mb-0 city-group">
                                            <select name="city_id" id="city_id"
                                                class="w-100 city form-select @error('city_id') is-invalid @enderror">
                                                <option value=""> - - Select City - -
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
                                    </div>
                                    <div class="search-btn">
                                        <button class="btn search_service" type="submit">
                                            Search
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="search-cat">
                                <i class="fas fa-circle"></i>
                                <span>Popular Searches</span>
                                @foreach ($services as $service)
                                    <a href="">{{ $service->servicetitle }}</a>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Hero Section -->

    <!-- Category Section -->
    <section class="category-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading aos" data-aos="fade-up">
                                <h2>Featured Categories</h2>
                                <span>What do you need to find?</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="viewall aos" data-aos="fade-up">
                                <h4>
                                    <a href="{{ route('categories') }}">View All <i class="fas fa-angle-right"></i></a>
                                </h4>
                                <span>Featured Categories</span>
                            </div>
                        </div>
                    </div>
                    <div class="catsec">
                        <div class="row">
                            @foreach ($categories as $category)
                                <div class="col-lg-4 col-md-6">
                                    <a href="{{ route('category', $category->categoryslug) }}">
                                        <div class="cate-widget">
                                            @if($category->categoryimage)
                                            <img class="categoryimg" src="{{ asset('/images/admin/categoryimage/' . $category->categoryimage) }}"
                                                alt="Category Image" style="height: 251px; width: 376px;" />
                                                @else
                                                <img class="categoryimg" src="{{ asset('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                alt="Category Image" style="height: 251px; width: 376px;" />
                                                @endif
                                            <div class="cate-title">
                                                <h3>
                                                    <span><i class="fas fa-circle"></i>{{ $category->categoryname }}</span>
                                                </h3>
                                            </div>
                                            <div class="cate-count">
                                                <i class="fas fa-clone"></i> 21
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Category Section -->

    <!-- Popular Servides -->
    <section class="popular-services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading aos" data-aos="fade-up">
                                <h2>Most Popular Services</h2>
                                <span>Explore the greates our services. You won’t be
                                    disappointed</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="viewall aos" data-aos="fade-up">
                                <h4>
                                    <a href="{{ route('services') }}">View All <i class="fas fa-angle-right"></i></a>
                                </h4>
                                <span>Most Popular</span>
                            </div>
                        </div>
                    </div>
                    <div class="service-carousel">
                        <div class="service-slider owl-carousel owl-theme aos" data-aos="fade-up">
                            @foreach ($services as $service)
                                <div class="service-widget">
                                    <div class="service-img">
                                        <a href="{{ route('servicedetails', $service->slug) }}">
                                            @if ($service->image != '' || $service->serviceimage != null)
                                                <img class="img-fluid serv-img serviceimg" alt="Service Image"
                                                    src="{{ asset('/images/admin/serviceimage/' . $service->serviceimage) }}"
                                                    style="height: 252.25px; width: 373.51px;" />
                                            @else
                                                <img class="img-fluid serv-img serviceimg" alt="Service Image"
                                                    src="{{ asset('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}"
                                                    style="height: 252.25px; width: 373.51px;" />
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
                                                    <img src="{{ asset('frontend/assets/img/customer/user-01.jpg') }}"
                                                        alt="" />
                                                </a>
                                                <span class="service-price">₹{{ $service->serviceamount }}</span>
                                            </div>
                                            <div class="cate-list">
                                                <a class="bg-yellow"
                                                    href="#">{{ $service->category->categoryname }}</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="service-content">
                                        <h3 class="title">
                                            <a href="#">{{ $service->servicetitle }}</a>
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
                                                    <span
                                                        class="mobilenumber">{{ $service->provider->mobilenumber ?? '' }}</span>
                                                </span>
                                                <span class="col ser-location">
                                                    <span>Pune</span>
                                                    <i class="fas fa-map-marker-alt ms-1"></i>
                                                </span>
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
    </section>
    <!-- /Popular Servides -->

    <!-- How It Works -->
    <section class="how-work">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading howitworks aos" data-aos="fade-up">
                        <h2>How It Works</h2>
                        <span></span>
                    </div>
                    <div class="howworksec">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="howwork aos" data-aos="fade-up">
                                    <div class="iconround">
                                        <div class="steps">01</div>
                                        <img src="{{ asset('frontend/assets/img/icon-1.png') }}" alt="" />
                                    </div>
                                    <h3>Choose What To Do</h3>
                                    <p>

                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="howwork aos" data-aos="fade-up">
                                    <div class="iconround">
                                        <div class="steps">02</div>
                                        <img src="{{ asset('frontend/assets/img/icon-2.png') }}" alt="" />
                                    </div>
                                    <h3>Find What You Want</h3>
                                    <p>

                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="howwork aos" data-aos="fade-up">
                                    <div class="iconround">
                                        <div class="steps">03</div>
                                        <img src="{{ asset('frontend/assets/img/icon-3.png') }}" alt="" />
                                    </div>
                                    <h3>Amazing Places</h3>
                                    <p>

                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /How It Works -->

    <!-- /our app -->
    <section class="app-set">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-12">
                    <div class="col-md-12">
                        <div class="heading aos" data-aos="fade-up">
                            <h2>Download Our App</h2>
                            <span></span>
                        </div>
                    </div>
                    <div class="downlaod-set aos" data-aos="fade-up">
                        <ul>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/assets/img/gp.png') }}"
                                        alt="img" /></a>
                            </li>
                            <li>
                                <a href="#"><img src="{{ asset('frontend/assets/img/ap.png') }}"
                                        alt="img" /></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="appimg-set aos" data-aos="fade-up">
                        <img src="{{ asset('frontend/assets/img/app.png') }}" alt="img" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /our app -->
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            var input = $('.mobilenumber').html();
            input = input.replace(/^(\d{0,4})(\d{0,3})/, '$1 $2')
            var prefix = input.substr(0, input.length - 4);
            var suffix = input.substr(-4);
            var masked = prefix.replace(/\d/g, '*');
            var a = masked + suffix;
            $('.mobilenumber').html(a);
        });
    </script>
@endsection
