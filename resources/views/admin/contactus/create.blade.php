@extends('admin.layouts.app')
@section('head')
<!-- Datepicker CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">
@endsection
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
                                <h2>Add Contact</h2>
                                <a href="{{ route('admincontactus.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{route('admincontactus.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="firstname">First Name<span class="text-danger">*</span></label>
                                                <input value="{{ old('firstname') }}" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" id="firstname" placeholder="Enter First Name" required>
                                                @error('firstname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="lastname">Last Name<span class="text-danger">*</span></label>
                                                <input value="{{ old('lastname') }}" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" id="lastname" placeholder="Enter Last Name" required>
                                                @error('lastname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="email">Email ID<span class="text-danger">*</span></label>
                                                <input value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Enter Email ID" required>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="mobilenumber">Mobile Number<span class="text-danger">*</span></label>
                                                <input value="{{ old('mobilenumber') }}" type="text" min="0" onkeypress="return event.charCode >= 48 && event.charCode <= 57" pattern="[6-9]{1}[0-9]{9}"  class="form-control @error('mobilenumber') is-invalid @enderror" name="mobilenumber" id="mobilenumber" placeholder="Enter Mobile Number" required>
                                                @error('mobilenumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="message">Message<span class="text-danger">*</span></label>
                                                <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror" placeholder="Enter Message">{{ old('message') }}</textarea>
                                                @error('message')
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
                                            Cancel
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


@section('js')
<!-- Datepicker Core JS -->
<script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>
@endsection
