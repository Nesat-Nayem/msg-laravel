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
                            <div class="section-header d-flex justify-content-between mb-4">
                                <h2>Edit Sub Category</h2>
                                <a href="{{ route('admin-subcategory.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{ route('admin-subcategory.update', $subcategory->id) }}" method="POST" autocomplete="on" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="category_id">Category Name<span class="text-danger">
                                                        *</span></label>
                                                <select name="category_id" id="category_id" class="w-100 form-select required autofocus @error('category_id') is-invalid @enderror">
                                                    <option value=""> - - Select Category - -
                                                    </option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" @if ($subcategory->category_id == $category->id) selected @endif>
                                                        {{ $category->categoryname }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="subcategoryname">Sub Category Name</label>
                                                <input value="{{ $subcategory->subcategoryname }}" type="text" class="form-control @error('subcategoryname') is-invalid @enderror" name="subcategoryname" id="subcategoryname" placeholder="Enter Sub Category Name" required onkeyup="generateSlug();">
                                                @error('subcategoryname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="subcategoryslug">Sub Category Slug (Ex:test-slug)</label>
                                                <input value="{{ $subcategory->subcategoryslug }}" type="text" class="form-control @error('subcategoryslug') is-invalid @enderror" name="subcategoryslug" id="subcategoryslug" placeholder="Enter Sub Category Slug" required readonly>
                                                @error('subcategoryslug')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="subcategoryimage">Sub Category Image <span>(375 x
                                                        250)</span></label>
                                                <input value="{{ old('subcategoryimage') }}" type="file" class="form-control @error('subcategoryimage') is-invalid @enderror" name="subcategoryimage" id="subcategoryimage">
                                                @error('subcategoryimage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2 col-12">
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    @if ($subcategory->subcategoryimage)
                                                    <img src="{{ url('/images/admin/subcategoryimage/' . $subcategory->subcategoryimage) }}" width="80" height="80">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status<span class="text-danger">*</span></label>
                                                <select name="status" class="form-select @error('status') is-invalid @enderror" id="status">
                                                    <option value=""> - - Select Status - - </option>
                                                    <option value="active" @if ($subcategory->status == 'active') selected @endif>
                                                        Active</option>
                                                    <option value="inactive" @if ($subcategory->status == 'inactive') selected @endif>
                                                        Inactive</option>
                                                </select>
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
                                            Update
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


@section('js')
<script>
    function generateSlug() {
        var subcategoryname = $('#subcategoryname').val();
        const slugify =
            subcategoryname
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');

        $('#subcategoryslug').val(slugify);
    }
</script>
@endsection
