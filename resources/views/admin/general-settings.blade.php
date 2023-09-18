@extends('admin.layouts.app')
@section('content')
    <div class="content container-fluid">
        <div class="row mb-3">
            <div class="col-12">
                <h3 class="page-title">General Settings</h3>
            </div>
        </div>
        @include('toastr')
        <form action="{{ route('admin-generalsettings.update', $generalsetting->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Website Basic Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="settings-form">
                                        <div class="form-group">
                                            <label for="websitename">Website Name <span
                                                    class="text-danger">*</span>(English)</label>
                                            <input value="{{ $generalsetting->websitename }}" type="text"
                                                class="form-control @error('websitename') is-invalid @enderror"
                                                name="websitename" id="websitename" placeholder="Enter Website Name">
                                            @error('websitename')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="contactdetails">Contact Details <span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $generalsetting->contactdetails }}" type="text"
                                                class="form-control @error('contactdetails') is-invalid @enderror"
                                                name="contactdetails" id="contactdetails"
                                                placeholder="Enter Contact Details">
                                            @error('contactdetails')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="mobilenumber">Mobile Number<span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $generalsetting->mobilenumber }}" type="text" min="0"
                                                onkeypress="return event.charCode >= 48 && event.charCode <= 57"
                                                pattern="[6-9]{1}[0-9]{9}"
                                                class="form-control @error('mobilenumber')
is-invalid
@enderror"
                                                name="mobilenumber" id="mobilenumber" placeholder="Enter Mobile Number">
                                            @error('mobilenumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="language">Language<span class="text-danger">*</span></label>
                                            <input value="English" type="text"
                                                class="form-control @error('language') is-invalid @enderror" name="language"
                                                id="language" placeholder="Enter Language" readonly>
                                            @error('language')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="status-toggle d-flex justify-content-between align-items-center">
                                                <p class="mb-0">Service Location Radius</p>
                                                <input type="checkbox" id="status_1" class="check" />
                                                <label for="status_1" class="checktoggle">checkbox</label>
                                            </div>
                                            <div class="loan-set text-center my-2">
                                                <h3><input type="text" id="currencys" name="location_radius"
                                                        class="border-0" style="width: 32px;">km</h3>
                                            </div>
                                            <input type="range" min="1" max="10000" value="1"
                                                class="slider" id="myRange">
                                        </div>
                                        <div class="form-group has-success">
                                            <label class="d-flex">
                                                <span>Service Location Type</span>
                                            </label>
                                            <div class="form-group mb-4 has-success">
                                                <div class="custom-control custom-radios custom-control-inline">
                                                    <input class="custom-control-input" id="manual" type="radio"
                                                        name="service_locationtype" value="manual" checked
                                                        data-bv-field="service_locationtype"
                                                        {{ $generalsetting->service_locationtype == 'manual' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="manual">Manual</label>
                                                </div>
                                                <div class="custom-control custom-radios custom-control-inline">
                                                    <input class="custom-control-input" id="live" type="radio"
                                                        name="service_locationtype" value="live"
                                                        data-bv-field="service_locationtype"
                                                        {{ $generalsetting->service_locationtype == 'live' ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="live">Live</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            <div class="settings-btns">
                                                <button class="btn btn-primary submit-btn" type="submit">
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Image Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="form-group">
                                        <p class="settings-label">
                                            Logo <span class="text-danger">*</span>
                                        </p>
                                        <div class="settings-btn">
                                            <input type="file" name="logo" id="logo"
                                                onchange="loadFile(event)"
                                                class="hide-input @error('logo') is-invalid @enderror">

                                            @error('logo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="logo" class="upload">
                                                <i class="fa fa-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">
                                            Recommended image size is <span>150px x 150px</span>
                                        </h6>
                                        <div class="upload-images">
                                            @if ($generalsetting->logo)
                                                <img
                                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->logo) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="settings-label">
                                            Favicon <span class="text-danger">*</span>
                                        </p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="favicon" id="favicon"
                                                onchange="loadFile(event)"
                                                class="hide-input @error('favicon') is-invalid @enderror">
                                            @error('favicon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="favicon" class="upload">
                                                <i class="fa fa-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">
                                            Recommended image size is
                                            <span>16px x 16px or 32px x 32px</span>
                                        </h6>
                                        <h6 class="settings-size mt-1">
                                            Accepted formats: only png and ico
                                        </h6>
                                        <div class="upload-images upload-size">
                                            @if ($generalsetting->favicon)
                                                <img
                                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->favicon) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="settings-label">
                                            Icon <span class="text-danger">*</span>
                                        </p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="icon" id="icon"
                                                onchange="loadFile(event)"
                                                class="hide-input @error('icon') is-invalid @enderror">
                                            @error('icon')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="icon" class="upload">
                                                <i class="fa fa-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">
                                            Recommended image size is
                                            <span>100px x 100px</span>
                                        </h6>
                                        <div class="upload-images upload-size">
                                            @if ($generalsetting->icon)
                                                <img
                                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->icon) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button class="btn btn-primary submit-btn" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Placeholder Image Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="form-group">
                                        <p class="settings-label">
                                            Service Placeholder <span class="text-danger">*</span>
                                        </p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="service_placeholder"
                                                id="service_placeholder" onchange="loadFile(event)"
                                                class="hide-input @error('service_placeholder') is-invalid @enderror">
                                            @error('service_placeholder')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="service_placeholder" class="upload">
                                                <i class="fa fa-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">
                                            Recommended image size is <span>800px x 600px</span>
                                        </h6>
                                        <div class="upload-images">
                                            @if ($generalsetting->service_placeholder)
                                                <img
                                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->service_placeholder) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="settings-label">
                                            Profile Placeholder <span class="text-danger">*</span>
                                        </p>
                                        <div class="settings-btn">
                                            <input type="file" accept="image/*" name="profile_placeholder"
                                                id="profile_placeholder" onchange="loadFile(event)"
                                                class="hide-input @error('profile_placeholder') is-invalid @enderror">
                                            @error('profile_placeholder')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="profile_placeholder" class="upload">
                                                <i class="fa fa-upload"></i>
                                            </label>
                                        </div>
                                        <h6 class="settings-size">
                                            Recommended image size is
                                            <span>300px x 300px</span>
                                        </h6>
                                        <div class="upload-images upload-size">
                                            @if ($generalsetting->profile_placeholder)
                                                <img
                                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button class="btn btn-primary submit-btn" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Admin Access Settings</h5>
                        </div>
                        <div class="card-body">
                            <div class="row justify-content-center">
                                <div>
                                    <div class="form-group has-success">
                                        <label class="d-flex">
                                            <span>Demo Access</span>
                                        </label>
                                        <div class="form-group mb-4 has-success">
                                            <div class="custom-control custom-radios custom-control-inline">
                                                <input class="custom-control-input" id="yes" type="radio"
                                                    name="demo_access" value="yes" checked data-bv-field="demo_access"
                                                    {{ $generalsetting->demo_access == 'yes' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="yes">Yes</label>
                                            </div>
                                            <div class="custom-control custom-radios custom-control-inline">
                                                <input class="custom-control-input" id="no" type="radio"
                                                    name="demo_access" value="no" data-bv-field="demo_access"
                                                    {{ $generalsetting->demo_access == 'no' ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0">
                                        <div class="settings-btns">
                                            <button class="btn btn-primary submit-btn" type="submit">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
