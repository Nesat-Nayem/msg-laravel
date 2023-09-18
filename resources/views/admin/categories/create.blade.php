@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    @include('toastr')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="section-header d-flex justify-content-between mb-4">
                                <h2>Add Category</h2>
                                <a href="{{ route('admin-category.index') }}" class="btn btn-primary"
                                    style="height: 34px; border-radius: 30px;"><i
                                        class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{ route('admin-category.store') }}" method="POST" autocomplete="on"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="categoryname">Category Name<span class="text-danger">*
                                                        (Category
                                                        name must be
                                                        unique)</span></label>
                                                <input value="{{ old('categoryname') }}" type="text"
                                                    class="form-control @error('categoryname') is-invalid @enderror"
                                                    name="categoryname" id="categoryname"
                                                    placeholder="Enter Category Name" required
                                                    onkeyup="generateSlug();">
                                                @error('categoryname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="categoryslug">Category Slug (Ex:test-slug)</label>
                                                <input value="{{ old('categoryslug') }}" type="text"
                                                    class="form-control @error('categoryslug') is-invalid @enderror"
                                                    name="categoryslug" id="categoryslug"
                                                    placeholder="Enter Category Slug" required readonly>
                                                @error('categoryslug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="categoryimage">Category Image <span>(375 x
                                                        250)</span></label>
                                                <input type="file"
                                                    class="form-control @error('categoryimage') is-invalid @enderror"
                                                    name="categoryimage" id="categoryimage">
                                                @error('categoryimage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="commission_percentage">Commission Percentage</label>
                                                <input value="{{ old('commission_percentage') }}" type="text"
                                                    class="form-control @error('commission_percentage') is-invalid @enderror"
                                                    name="commission_percentage" id="commission_percentage"
                                                    placeholder="Enter Commission Percentage">
                                                @error('commission_percentage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status<span class="text-danger">*</span></label>
                                                <select name="status"
                                                    class="form-select @error('status') is-invalid @enderror"
                                                    id="status">
                                                    <option value=""> - - Select Status - - </option>
                                                    <option value="active" {{ old('status')=='active' ? 'selected' : ''
                                                        }}>Active</option>
                                                    <option value="inactive" selected {{ old('status')=='inactive'
                                                        ? 'selected' : '' }}>
                                                        Inactive</option>
                                                </select>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Is Featured?</label><br>
                                                <input type="radio" id="yes" name="categoryfeature" value="yes"
                                                    checked />
                                                <label>Yes</label>
                                                <input type="radio" id="no" name="categoryfeature"
                                                    value="no" /><label>No</label>
                                            </div>
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
<script>
    function generateSlug() {
        var categoryname = $('#categoryname').val();
        const slugify =
            categoryname
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');

        $('#categoryslug').val(slugify);
    }

</script>
@endsection
