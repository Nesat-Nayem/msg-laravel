@extends('admin.layouts.app')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Providers</h3>
                </div>
                <div class="col-auto text-end">
                    <a href="{{ route('admin-provider.create') }}" class="btn btn-primary add-button ml-3">
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
                                        <th>Provider Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Reg Date</th>
                                        <th>Subscription</th>
                                        <th>Profile Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="mb-4">
                                    @foreach ($providers as $provider)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $provider->name }}</td>
                                            <td>{{ $provider->mobilenumber }}</td>
                                            <td>{{ $provider->email }}</td>
                                            <td>{{ $provider->created_at->format('d-m-Y') }}</td>
                                            <td>{{ $provider->subscription->plan ?? '' }}</td>
                                            <td>
                                                @if($provider->profileimage != '' || $provider->profileimage != null)
                                                <a href="{{ asset('/images/admin/providerprofileimage/' . $provider->profileimage) }}"
                                                    target="__blank">View</a>
                                                @else
                                                <a href="{{ asset('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                                    target="__blank">View</a>
                                                @endif
                                            </td>
                                            <td>{{ $provider->status }}</td>
                                            <td class="btn-group">
                                                <a class="edit btn btn-outline-secondary" style="display:inline"
                                                    href="{{ route('admin-provider.edit', $provider->id) }}"><i
                                                        class="fa fa-edit text-success" style="font-size: medium;"></i></a>
                                                <form action="{{ route('admin-provider.destroy', $provider->id) }}"
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
