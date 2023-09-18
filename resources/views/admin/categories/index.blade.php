@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Categories</h3>
            </div>
            <div class="col-auto text-end">
                <a href="{{ route('admin-category.create') }}" class="btn btn-primary add-button ms-3">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- /Page Header -->

    @include('toastr')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-center mb-0" id="example">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Category</th>
                                    <th>Category Slug</th>
                                    <th>Date</th>
                                    <th>Featured</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="mb-4">
                                @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$category->categoryname}}</td>
                                    <td>{{$category->categoryslug}}</td>
                                    <td>{{$category->created_at->format('d-m-Y')}}</td>
                                    <td>{{$category->categoryfeature}}</td>
                                    <td>{{$category->status}}</td>
                                    <td class="btn-group">
                                        <a class="edit btn btn-outline-secondary" style="display:inline" href="{{ route('admin-category.edit', $category->id) }}"><i class="fa fa-edit text-success" style="font-size: medium;"></i></a>
                                        <form action="{{ route('admin-category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Are you sure, You want to Delete this?')" class="ms-2 btn btn-outline-secondary"><i class="fa fa-trash text-danger" style="font-size: medium;"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
