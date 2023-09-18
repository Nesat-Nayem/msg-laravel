@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">Subscriptions</h3>
            </div>
            <div class="col-auto text-end">
                <a href="{{ route('adminsubscription.create') }}" class="btn btn-primary add-button ml-3">
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
                                    <th>Plan</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="mb-4">
                                @foreach ($subscriptions as $subscription)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $subscription->plan }}</td>
                                    <td>{{ $subscription->startdate }}</td>
                                    <td>{{ $subscription->enddate }}</td>
                                    <td>{{ $subscription->amount }}</td>
                                    <td>{{ $subscription->status }}</td>
                                    <td class="btn-group">
                                        <a class="edit btn btn-outline-secondary" style="display:inline" href="{{ route('adminsubscription.edit', $subscription->id) }}"><i class="fa fa-edit text-success" style="font-size: medium;"></i></a>
                                        <form action="{{ route('adminsubscription.destroy', $subscription->id) }}" method="POST">
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
