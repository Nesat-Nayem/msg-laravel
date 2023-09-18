@extends('admin.layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Services</h3>
                </div>
                <div class="col-auto text-end">
                    <a href="{{ route('admin-service.index') }}" class="btn btn-primary add-button me-2"><i
                            class="fas fa-sync"></i></a>
                    <a class="btn btn-white filter-btn mr-3 me-2" href="javascript:void(0);" id="filter_search">
                        <i class="fas fa-filter"></i>
                    </a>
                    <a href="{{ route('admin-service.create') }}" class="btn btn-primary add-button"><i
                            class="fas fa-plus"></i></a>
                </div>
            </div>
        </div>
        <!-- Search Filter -->
        <form action="{{ route('admin.service_filter') }}" method="POST" id="filter_inputs">
            @csrf
            <div class="card filter-card">
                <div class="card-body pb-0">
                    <div class="row filter-row">
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>Service</label>
                                <input class="form-control" name="servicename" type="text">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>From Date</label>
                                <input class="form-control" name="fromdate" type="date">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label>To Date</label>
                                <input class="form-control" name="todate" type="date">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <button class="btn btn-primary btn-block w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /Search Filter -->
        @include('toastr')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @isset($data)
                                <table class="table table-hover table-center mb-0" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mb-4">
                                        @foreach ($data as $service)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $service->servicetitle }}</td>
                                                <td>{{ $service->country->countryname ?? '' }}</td>
                                                <td>{{ $service->state->statename ?? '' }}</td>
                                                <td>{{ $service->city->cityname ?? '' }}</td>
                                                <td>{{ $service->category->categoryname ?? '' }}</td>
                                                <td>{{ $service->serviceamount }}</td>
                                                <td>{{ $service->created_at->format('d-m-Y') }}</td>
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
                                </table>
                            @endisset
                            @if (!isset($data))
                                <table class="table table-hover table-center mb-0" id="example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Country</th>
                                            <th>State</th>
                                            <th>City</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="mb-4">
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $service->servicetitle }}</td>
                                                <td>{{ $service->country->countryname ?? '' }}</td>
                                                <td>{{ $service->state->statename ?? '' }}</td>
                                                <td>{{ $service->city->cityname ?? '' }}</td>
                                                <td>{{ $service->category->categoryname ?? '' }}</td>
                                                <td>{{ $service->serviceamount }}</td>
                                                <td>{{ $service->created_at->format('d-m-Y') }}</td>
                                                <td>{{ $service->status }}</td>
                                                <td class="btn-group">
                                                    <a class="edit btn btn-outline-secondary" style="display:inline"
                                                        href="{{ route('admin-service.edit', $service->id) }}"><i
                                                            class="fa fa-edit text-success"
                                                            style="font-size: medium;"></i></a>
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
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
