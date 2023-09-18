@extends('admin.layouts.app')
@section('head')
<!-- Datepicker CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">
@endsection
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">States</h3>
            </div>
            <div class="col-auto text-end">
                <a href="{{ route('admin-state.create') }}" class="btn btn-primary add-button ml-3">
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
                                    <th style="width: 20%;">#</th>
                                    <th style="width: 30%;">Country Name</th>
                                    <th style="width: 30%;">State Name</th>
                                    <th style="width: 20%;">Action</th>
                                </tr>
                            </thead>
                            <tbody class="mb-4">
                                @foreach($states as $state)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{$state->country->countryname}}</td>
                                    <td>{{$state->statename}}</td>
                                    <td class="btn-group">
                                        <a class="edit btn btn-outline-secondary" style="display:inline" href="{{ route('admin-state.edit', $state->id) }}"><i class="fa fa-edit text-success" style="font-size: medium;"></i></a>
                                        <form action="{{ route('admin-state.destroy', $state->id) }}" method="POST">
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

@section('js')

<!-- Datepicker Core JS -->
<script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>

@endsection
