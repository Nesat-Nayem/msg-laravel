@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @include('toastr')
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="section-header d-flex justify-content-between mb-3">
                                <h2>Add User</h2>
                                <a href="{{ route('admin-users.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{route('admin-users.store')}}" method="POST" autocomplete="on" enctype="multipart/form-data">
                                @csrf
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="name">Name<span class="text-danger">*</span></label>
                                                <input value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter Name" required autofocus>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="contactno">Mobile Number<span class="text-danger">*</span></label>
                                                <input value="{{ old('contactno') }}" type="text" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[6-9]{1}[0-9]{9}" class="form-control @error('contactno') is-invalid @enderror" name="contactno" id="contactno" placeholder="Enter Mobile Number" required>
                                                @error('contactno')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email<span class="text-danger">*</span></label>
                                                <input value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="password">Password<span class="text-danger">*</span></label>
                                                <input value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter Password" required>
                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="profileimage">Profile Image</label>
                                                <input type="file" class="form-control @error('profileimage') is-invalid @enderror" name="profileimage" id="profileimage">
                                                @error('profileimage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <input type="radio" name="status" id="active" class="ms-3 me-1" value="active" checked><label for="active" class="me-2">Active</label>
                                                <input type="radio" name="status" id="inactive" class="me-1" value="inactive"><label for="inactive">Inactive</label>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section text-start">
                                        <button class="btn btn-primary submit-btn" type="submit">
                                            Submit
                                        </button>
                                        <button class="btn btn-danger submit-btn" type="reset">
                                            Reset
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

