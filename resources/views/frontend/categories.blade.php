@extends('frontend.layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="breadcrumb-bar">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="breadcrumb-title">
                    <h2>Categories</h2>
                </div>
            </div>
            <div class="col-auto float-end ms-auto breadcrumb-menu">
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('index')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Categories
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
                @foreach ($categories as $category)
                <div class="col-lg-4 col-md-6">
                    <a href="{{ route('category', $category->categoryslug) }}">
                        <div class="cate-widget">
                            <img src="{{ asset('/images/admin/categoryimage/' .$category->categoryimage) }}"
                                alt="Category-Image" style="height: 257.09px; width: 376.02px;" />
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

@endsection
