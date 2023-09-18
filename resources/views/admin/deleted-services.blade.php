@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Deleted Service</h3>
            </div>
        </div>
    </div>
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
                                        <th>Services</th>
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tbody class="mb-4">
                                    @foreach($services as $service)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{$service->servicetitle}}</td>
                                        <td>{{$service->category->categoryname ?? ''}}</td>
                                        <td>{{$service->subcategory->subcategoryname ?? ''}}</td>
                                        <td>{{$service->serviceamount}}</td>
                                        <td>{{$service->created_at->format('d-m-Y')}}</td>
                                        <td>{{ $service->status }}</td>

                                        <td class="btn-group">
                                            <a class="edit btn btn-outline-secondary" style="display:inline"
                                                href="{{ route('admin-service.edit', $service->id) }}"><i
                                                    class="fa fa-edit text-success" style="font-size: medium;"></i></a>
                                            <form action="{{ route('admin-service.destroy', $service->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure, You want to Delete this?')"
                                                    class="ms-2 btn btn-outline-secondary"><i
                                                        class="fa fa-trash text-danger"
                                                        style="font-size: medium;"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
