@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-xl-8 offset-xl-2">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">Change Password</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->
            @include('toastr')
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.updatepassword') }}" method="POST" autocomplete="on"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="old_password">Old Password<span class="text-danger">*</span></label>
                            <input value="{{ old('old_password') }}" type="password"
                                class="form-control @error('old_password') is-invalid @enderror" name="old_password"
                                id="old_password" placeholder="Enter old password" required>
                            @error('old_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="new_password">New Password<span class="text-danger">*</span></label>
                            <input value="{{ old('new_password') }}" type="password"
                                class="form-control @error('new_password') is-invalid @enderror" name="new_password"
                                id="new_password" placeholder="Enter new password" required>
                            @error('new_password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="confirmpassword">Confirm Password<span class="text-danger">*</span></label>
                            <input value="{{ old('confirmpassword') }}" type="password"
                                class="form-control @error('confirmpassword') is-invalid @enderror"
                                name="confirmpassword" id="confirmpassword" placeholder="Enter confirm password"
                                required>
                            @error('confirmpassword')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mt-4 save-form">
                            <button class="btn save-btn btn-primary" type="submit">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
