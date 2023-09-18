@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col">
                <h3 class="page-title">User Wallet</h3>
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
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Wallet Amt</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody class="mb-4">
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->created_at->format('d M Y') }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->contactno }}</td>
                                    <td>₹{{ $user->user_wallet }}</td>
                                    <td> <span class="badge" style="background-color: #FF6800;">User</span></td>
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