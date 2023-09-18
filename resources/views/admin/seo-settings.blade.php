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
            <h3 class="page-title">SEO Settings</h3>
        </div>
    </div>
    @include('toastr')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form action="{{ route('admin-seosettings.update', $seo->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="settings-form">
                                <div class="form-group">
                                    <label for="metatitle">Meta Title (English)<span
                                            class="text-danger">*</span></label>
                                    <input value="{{ $seo->metatitle }}" type="text"
                                        class="form-control @error('metatitle') is-invalid @enderror" name="metatitle"
                                        id="metatitle" placeholder="Enter Meta Title" required>
                                    @error('metatitle')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="metakeyword">Meta Keywords (English)<span
                                            class="text-danger">*</span></label>
                                    <input value="{{ $seo->metakeyword }}" type="text"
                                        class="form-control @error('metakeyword') is-invalid @enderror"
                                        name="metakeyword" id="metakeyword" placeholder="Enter Meta Keywords" required>
                                    @error('metakeyword')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Meta Description (English)<span class="text-danger">*</span></label>
                                    <input value="{{ $seo->metadescription }}" type="text"
                                        class="form-control @error('metadescription') is-invalid @enderror"
                                        name="metadescription" id="metadescription" placeholder="Enter Meta Description"
                                        required>
                                    @error('metadescription')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-0">
                                    <div class="settings-btns">
                                        <button class="btn btn-primary submit-btn" type="submit">
                                            Update
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
