@extends('admin.layouts.app')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                </div>
                <div class="col-auto text-end">
                    <a href="{{ route('admin-users.create') }}" class="btn btn-primary add-button ml-3">
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
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>UserName</th>
                                        <th>Email</th>
                                        <th>Contact No</th>
                                        <th>Signup Date</th>
                                        <th>Profile Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="mb-4">
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->contactno }}</td>
                                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                                            <td>
                                                @if($user->profileimage != '' || $user->profileimage != null)
                                                <a href="{{ asset('/images/admin/usersprofileimage/' . $user->profileimage) }}"
                                                    target="__blank">View</a>
                                                @else
                                                <a href="{{ asset('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                                    target="__blank">View</a>
                                                @endif
                                            </td>
                                            <td>{{ $user->status }}</td>
                                            <td class="btn-group">
                                                <a class="edit btn btn-outline-secondary" style="display:inline"
                                                    href="{{ route('admin-users.edit', $user->id) }}"><i
                                                        class="fa fa-edit text-success" style="font-size: medium;"></i></a>
                                                <form action="{{ route('admin-users.destroy', $user->id) }}" method="POST">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
