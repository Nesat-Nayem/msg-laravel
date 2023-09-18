@extends('admin.layouts.app')
@section('head')
<!-- Feather CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/icons/feather/feather.css') }}">
<!-- Select2 CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}">
@endsection
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-lg-8 m-auto">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-12">
                        <h3 class="page-title">Frontend Settings</h3>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-heads">
                                <h4 class="card-title">Header Setting</h4>
                                <div class="col-auto">
                                    <div class="status-toggle">
                                        <input id="otp" class="check" type="checkbox" checked="" />
                                        <label for="otp" class="checktoggle">checkbox</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <p class="settings-label">Header Logo</p>
                                <div class="settings-btn">
                                    <input type="file" accept="image/*" name="image" id="file" onchange="loadFile(event)" class="hide-input" />
                                    <label for="file" class="upload">
                                        <i class="fa fa-upload"></i>
                                    </label>
                                </div>
                                <div class="upload-images d-block">
                                    <img src="{{ asset('admin/assets/img/services/service-13.png') }}" alt="Image" />
                                    <a href="javascript:void(0);" class="btn-icon logo-hide-btn">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <h6>banner-2.jpg</h6>
                                    <h5 class="m-0">43 KB</h5>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-5 col-12">
                                        <div class="card-heads mb-3">
                                            <h4 class="card-title f-14 m-0">Language</h4>
                                            <div class="col-auto">
                                                <div class="status-toggle">
                                                    <input id="language" class="check" type="checkbox" checked />
                                                    <label for="language" class="checktoggle">checkbox</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-heads mb-3">
                                            <h4 class="card-title f-14">Currency</h4>
                                            <div class="col-auto">
                                                <div class="status-toggle">
                                                    <input id="currency" class="check" type="checkbox" checked />
                                                    <label for="currency" class="checktoggle">checkbox</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-heads mb-3">
                                            <h4 class="card-title f-14">Stikcy header</h4>
                                            <div class="col-auto">
                                                <div class="status-toggle">
                                                    <input id="header" class="check" type="checkbox" checked />
                                                    <label for="header" class="checktoggle">checkbox</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-groupbtn">
                                <a class="btn btn-update me-2">Update</a>
                                <a class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <div class="card-heads">
                                <h4 class="card-title">Header Menu</h4>
                                <div class="col-auto">
                                    <div class="status-toggle">
                                        <input id="menu" class="check" type="checkbox" checked="" />
                                        <label for="menu" class="checktoggle">checkbox</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="card-heads">
                                    <h4 class="card-title f-14">Nav Menus</h4>
                                    <div class="col-auto">
                                        <a class="btn btn-reset">Reset</a>
                                    </div>
                                </div>
                            </div>
                            <div class="settings-form">
                                <div class="form-group links-cont">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-12">
                                            <input type="text" class="form-control" value="Categories" />
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                        <div class="col-lg-1 col-12">
                                            <a href="#" class="btn btn-sm bg-danger-light delete_review_comment">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group links-cont">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-12">
                                            <input type="text" class="form-control" value="About Us" />
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                        <div class="col-lg-1 col-12">
                                            <a href="#" class="btn btn-sm bg-danger-light delete_review_comment">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group links-cont">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-12">
                                            <input type="text" class="form-control" value="Contact Us" />
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <input type="text" class="form-control" value="" />
                                        </div>
                                        <div class="col-lg-1 col-12">
                                            <a href="#" class="btn btn-sm bg-danger-light delete_review_comment">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group links-cont">
                                    <div class="row align-items-center">
                                        <div class="col-lg-3 col-12">
                                            <input type="text" class="form-control" placeholder="Label" />
                                        </div>
                                        <div class="col-lg-8 col-12">
                                            <input type="text" class="form-control" placeholder="Link with http:// Or https://" />
                                        </div>
                                        <div class="col-lg-1 col-12">
                                            <a href="#" class="btn btn-sm bg-danger-light delete_review_comment">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <a class="btn btn-success addlinks"><i class="fa fa-plus me-2"></i>Add New</a>
                            </div>
                            <div class="form-groupbtn">
                                <a class="btn btn-update me-2">Update</a>
                                <a class="btn btn-cancel">Cancel</a>
                            </div>
                        </div>
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
