@extends('admin.layouts.app')
@section('head')
<!-- Feather CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/feather/feather.css') }}">
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}"><!-- Ck Editor -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/ckeditor.css') }}" />
@endsection
@section('content')
<div class="content container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <h3 class="page-title">Other Settings</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Enable Google Analytics</h5>
                    <div class="status-toggle d-flex justify-content-between align-items-center">
                        <input type="checkbox" id="status_1" class="check" checked="" />
                        <label for="status_1" class="checktoggle">checkbox</label>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form>
                        <div class="settings-form">
                            <div class="form-group">
                                <label>Google Analytics
                                    <span class="text-danger">*</span></label>
                                <textarea class="form-control" placeholder="Google Analytics"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <div class="settings-btns">
                                    <button class="btn btn-primary submit-btn" type="submit">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title">Cookies Agreement</h5>
                    <div class="status-toggle d-flex justify-content-between align-items-center">
                        <input type="checkbox" id="status_2" class="check" checked="" />
                        <label for="status_2" class="checktoggle">checkbox</label>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <form>
                        <div class="settings-form">
                            <div class="form-group">
                                <label>Google Adsense Code
                                    <span class="text-danger">*(English)</span></label>
                                <textarea class="form-control" placeholder="Google Adsense Code"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <div class="settings-btns">
                                    <button class="btn btn-primary submit-btn" type="submit">
                                        Save
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
@endsection
@section('js')
<!-- Feather Icon JS -->
<script src="{{ asset('admin/assets/js/feather.min.js') }}"></script>
<!-- Select2 JS -->
<script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
<!-- Ck Editor JS -->
<script src="{{ ('admin/assets/js/ckeditor.js') }}"></script>
<!-- Bootstrap Tagsinput JS -->
<script src="{{ ('admin/assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>

@endsection
