@extends('admin.layouts.app')
@section('head')
<!-- Feather CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/feather/feather.css') }}">
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('content')
<div class="content container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <h3 class="page-title">Login Settings</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Login Settings (one time setup)</h5>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form>
                            <div class="settings-form">
                                <div class="form-group has-success">
                                    <label class="d-flex">
                                        <span>Login Type</span>
                                    </label>
                                    <div class="form-group mb-4 has-success">
                                        <div class="custom-control custom-radios custom-control-inline">
                                            <input class="custom-control-input" id="mobileno" type="radio" name="location_type" value="mobileno" data-bv-field="location_type">
                                            <label class="custom-control-label" for="mobileno">Mobile No</label>
                                        </div>
                                        <div class="custom-control custom-radios custom-control-inline">
                                            <input class="custom-control-input" id="email" type="radio" name="location_type" value="email" checked="" data-bv-field="location">
                                            <label class="custom-control-label" for="email">Email</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group has-success">
                                    <label class="d-flex">
                                        <span>OTP By</span>
                                    </label>
                                    <div class="form-group mb-4 has-success">
                                        <div class="custom-control custom-radios custom-control-inline">
                                            <input class="custom-control-input" id="sms" type="radio" name="location_type" value="sms" checked="" data-bv-field="loc">
                                            <label class="custom-control-label" for="sms">SMS</label>
                                        </div>
                                        <div class="custom-control custom-radios custom-control-inline">
                                            <input class="custom-control-input" id="mail" type="radio" name="location_type" value="mail" data-bv-field="location_ty">
                                            <label class="custom-control-label" for="mail">Mail</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="settings-btns">
                                        <button type="submit" class="btn btn-orange">
                                            Update
                                        </button>
                                        <button type="reset" class="btn btn-grey">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<!-- Feather Icon JS -->
<script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>

<!-- Select2 JS -->
<script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
@endsection
</body>
</html>
