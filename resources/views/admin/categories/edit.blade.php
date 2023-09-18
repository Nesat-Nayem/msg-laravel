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
                                <h2>Edit category</h2>
                                <a href="{{ route('admin-category.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{route('admin-category.update', $category->id)}}" method="POST" autocomplete="on" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="categoryname">Category Name<span class="text-danger">*
                                                        Category
                                                        name must be
                                                        unique</span></label>
                                                <input value="{{ $category->categoryname }}" type="text" class="form-control @error('categoryname') is-invalid @enderror" name="categoryname" id="categoryname" placeholder="Enter Category Name" required autofocus onkeyup="generateSlug();">
                                                @error('categoryname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="categoryslug">Category Slug (Ex:test-slug)<span class="text-danger">*.</span></label>
                                                <input value="{{ $category->categoryslug }}" type="text" class="form-control @error('categoryslug') is-invalid @enderror" name="categoryslug" id="categoryslug" placeholder="Enter Category Slug" required readonly>
                                                @error('categoryslug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="categoryimage">Category Image <span>(375 x
                                                        250)</span></label>
                                                <input type="file" class="form-control @error('categoryimage') is-invalid @enderror" name="categoryimage" id="categoryimage">
                                                @error('categoryimage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    @if ($category->categoryimage)
                                                    <img src="{{ url('/images/admin/categoryimage/' . $category->categoryimage) }}" width="80" height="80">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status<span class="text-danger">*</span></label>
                                                <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                                                    <option value=""> - - Select Status - - </option>
                                                    <option value="active" @if ($category->status == 'active') selected @endif>
                                                        Active</option>
                                                    <option value="inactive" @if ($category->status == 'inactive') selected @endif>
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
                                                <input type="radio" id="yes" name="categoryfeature" value="yes" {{ ($category->categoryfeature=="yes")? "checked" : "" }} />
                                                <label for="yes">Yes</label>
                                                <input type="radio" id="no" name="categoryfeature" value="no" {{ ($category->categoryfeature=="no")? "checked" : "" }} /><label for="no">No</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start">
                                        <button class="btn btn-primary submit-btn" type="submit">
                                            Update
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
