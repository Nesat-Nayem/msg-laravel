@extends('frontend.layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-title">
                    <h2>Services</h2>
                </div>
            </div>
            <div class="col-auto float-end ms-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Services
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- /Breadcrumb -->

<div class="content">
    <div class="container">
        <div class="catsec clearfix">
            <div class="row">
                @foreach ($services as $service)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('search')}}">
                        <div class="cate-widget">
                            @if($service->serviceimage != '' || $service->serviceimage != null)
                            <img src="{{ asset('/images/admin/serviceimage/' .$service->serviceimage) }}"
                                alt="Service-Image" style="height: 254.96px; width:376.02px;" />
                            @else
                            <img src="{{ asset('/images/admin/generalsettings/' .$generalsetting->service_placeholder) }}"
                                alt="Service-Image" style="height: 254.96px; width:376.02px;" />
                            @endif
                            <div class="cate-title">
                                <h3>
                                    <span><i class="fas fa-circle"></i>{{ $service->category->categoryname }}</span>
                                </h3>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
