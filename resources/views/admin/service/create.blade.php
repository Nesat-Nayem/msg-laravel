@extends('admin.layouts.app')
@section('content')
<div class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-start">
                        <div class="col-md-12">
                            <div class="section-header d-flex justify-content-between mb-4">
                                <h2>Add Service</h2>
                                <a href="{{ route('admin-service.index') }}" class="btn btn-primary"
                                    style="height: 34px; border-radius: 30px;"><i
                                        class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{ route('admin-service.store') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="service-fields mb-3">
                                    <div class="membership-info">
                                        <div class="row form-row membership-cont">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="status">Service Status<span
                                                            class="text-danger">*</span></label>
                                                    <select name="status"
                                                        class="form-select @error('status') is-invalid @enderror"
                                                        id="status">
                                                        <option value=""> - - Select Status - - </option>
                                                        <option value="active" {{ old('status')=='active' ? 'selected'
                                                            : '' }}>Active</option>
                                                        <option value="inactive" selected {{ old('status')=='inactive'
                                                            ? 'selected' : '' }}>
                                                            Inactive</option>
                                                        <option value="pending" {{ old('status')=='pending' ? 'selected'
                                                            : '' }}>Pending</option>
                                                        <option value="deleted" {{ old('status')=='deleted' ? 'selected'
                                                            : '' }}>deleted</option>
                                                    </select>
                                                    @error('status')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-fields mb-3">
                                    <h4 class="heading-2">Service Information</h4>
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="provider_id">Select Provider<span class="text-danger">
                                                        *</span></label>
                                                <select name="provider_id" id="provider_id"
                                                    class="w-100 form-select required @error('provider_id') is-invalid @enderror">
                                                    <option value=""> - - Select Provider - -
                                                    </option>
                                                    @foreach ($providers as $provider)
                                                    <option value="{{ $provider->id }}" {{
                                                        old('provider_id')==$provider->id ? 'selected' : '' }}>
                                                        {{ $provider->name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('provider_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="servicetitle">Service Title<span
                                                        class="text-danger">*</span></label>
                                                <input value="{{ old('servicetitle') }}" type="text"
                                                    class="form-control @error('servicetitle') is-invalid @enderror"
                                                    name="servicetitle" id="servicetitle"
                                                    placeholder="Enter Service Title" required
                                                    onkeyup="generateSlug();">
                                                @error('servicetitle')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <input value="{{ old('slug') }}" type="hidden"
                                            class="form-control @error('slug') is-invalid @enderror" name="slug"
                                            id="slug" readonly>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="serviceamount">Service Amount<span
                                                        class="text-danger">*</span></label>
                                                <input value="{{ old('serviceamount') }}" type="text"
                                                    class="form-control @error('serviceamount') is-invalid @enderror"
                                                    name="serviceamount" id="serviceamount"
                                                    placeholder="Enter Service Amount" required>
                                                @error('serviceamount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="country_id">Country<span class="text-danger">
                                                        *</span></label>
                                                <select name="country_id" id="country_id"
                                                    onchange="getStates('country_id','state_id','city_id');"
                                                    class="w-100 form-select @error('country_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select Country - -
                                                    </option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ old('country_id')==$country->
                                                        id ? 'selected' : '' }}>
                                                        {{ $country->countryname }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                                @error('country_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="state_id">State<span class="text-danger">
                                                        *</span></label>
                                                <select name="state_id" id="state_id"
                                                    onchange="getCities('state_id', 'city_id');"
                                                    class="w-100 form-select @error('state_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select State - -
                                                    </option>
                                                </select>
                                                @error('state_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="city_id">City<span class="text-danger">
                                                        *</span></label>
                                                <select name="city_id" id="city_id"
                                                    class="w-100 form-select @error('city_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select City -
                                                        -
                                                    </option>
                                                </select>
                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-fields mb-3">
                                    <h4 class="heading-2">Service Category</h4>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="category_id">Category<span class="text-danger">
                                                        *</span></label>
                                                <select name="category_id" id="category_id"
                                                    class="w-100 form-select @error('category_id') is-invalid @enderror"
                                                    required
                                                    onchange="getSubCategory('category_id', 'subcategory_id');">
                                                    <option value=""> - - Select Category - -
                                                    </option>
                                                    @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}" {{
                                                        old('category_id')==$category->id ? 'selected' : '' }}>
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
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="subcategory_id">Sub Category<span class="text-danger">
                                                        *</span></label>
                                                <select name="subcategory_id" id="subcategory_id"
                                                    class="w-100 form-select required @error('subcategory_id') is-invalid @enderror">
                                                    <option value=""> - - Select Sub Category - - </option>
                                                </select>
                                                @error('subcategory_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-fields mb-3">
                                    <h4 class="heading-2">Service Offer</h4>
                                    <div class="membership-info">
                                        <div class="row form-row membership-cont">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="serviceoffer">Service Offered<span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ old('serviceoffer') }}" type="text"
                                                        class="form-control @error('serviceoffer') is-invalid @enderror"
                                                        name="serviceoffer" id="serviceoffer"
                                                        placeholder="Enter Service Offered" required>
                                                    @error('serviceoffer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-fields mb-3">
                                    <h3 class="heading-2">Service Image</h3>
                                    <div class="membership-info">
                                        <div class="row form-row membership-cont">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="service_image">Service Banner Image<span
                                                            class="text-danger">*</span></label>
                                                    <input type="file"
                                                        class="form-control @error('serviceimage') is-invalid @enderror"
                                                        name="serviceimage" id="serviceimage" required>
                                                    @error('serviceimage')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-fields mb-3">
                                    <h4 class="heading-2">Details Information</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="description">Descrptions<span
                                                        class="text-danger">*</span></label>
                                                <textarea
                                                    class="ckeditor form-control @error('description') is-invalid @enderror"
                                                    name="description" id="description" placeholder="Enter Description"
                                                    required>{{ old('description') }}</textarea>
                                                @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="service-fields mb-3">
                                    <h4 class="heading-2">Service Gallery </h4><span>(370 x 250)</span>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="service-upload">
                                                <i class="fas fa-cloud-upload-alt"></i>
                                                <span>Upload Service Images *</span>
                                                <input type="file"
                                                    class="form-control @error('service_gallery') is-invalid @enderror"
                                                    name="service_gallery" id="service_gallery" multiple>
                                                @error('service_gallery')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
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
    function getStates(country_id, state_id, city_id) {
        var country = document.getElementById(country_id).value;
        var StateField = document.getElementById(state_id);
        var CityField = document.getElementById(city_id);
        if (country) {
            $.ajax({
                type: "GET"
                , url: "{{ url('/getStateFromCountry') }}/" + country
                , success: function(data) {
                    StateField.options.length = 0;
                    $(StateField).append(
                        '<option value=""> - - Select State - - </option>');

                    CityField.options.length = 0;
                    $(CityField).append(
                        '<option value=""> - - Select City - - </option>');

                    for (var i in data) {
                        $(StateField).append('<option value=' + data[i].id + '>' + data[i]
                            .statename + '</option>');
                    }
                }
            });
        } else {
            StateField.options.length = 0;
            $(StateField).append(
                '<option value=""> - - Select State - - </option>');

            CityField.options.length = 0;
            $(CityField).append(
                '<option value=""> - - Select City - - </option>');
        }
    }

    function getCities(state_id, city_id) {
        var state = document.getElementById(state_id).value;
        var CityField = document.getElementById(city_id);
        if (state) {
            $.ajax({
                type: "GET"
                , url: "{{ url('/getCityFromState') }}/" + state
                , success: function(data) {
                    CityField.options.length = 0;
                    $(CityField).append(
                        '<option value=""> - - Select City - - </option>');

                    for (var i in data) {
                        $(CityField).append('<option value=' + data[i].id + '>' + data[i]
                            .cityname + '</option>');
                    }
                }
            });
        } else {
            CityField.options.length = 0;
            $(CityField).append(
                '<option value=""> - - Select City - - </option>');
        }
    }

    function getSubCategory(category_id, subcategory_id) {
        var category = document.getElementById(category_id).value;
        var SubCategoryField = document.getElementById(subcategory_id);
        if (category) {
            $.ajax({
                type: "GET"
                , url: "{{ url('/getSubCategoryFromCategory') }}/" + category
                , success: function(data) {
                    SubCategoryField.options.length = 0;
                    $(SubCategoryField).append('<option value=""> - - Select Sub Category - - </option>');
                    for (var i in data) {
                        $(SubCategoryField).append('<option value=' + data[i].id + '>' + data[i]
                            .subcategoryname + '</option>');
                    }
                }
            });
        } else {
            SubCategoryField.options.length = 0;
            $(SubCategoryField).append('<option value=""> - - Select Sub Category - - </option>');
        }
    }

</script>

<!-- My CUSTOM CKEditor Integration -->
<script src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });

    CKEDITOR.replace('description', {
        filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}"
        , filebrowserUploadMethod: 'form'
        , imageRemoveEvent: "",

        // removePlugins: 'blockquote,save,flash,iframe,tabletools,pagebreak,templates,about,showblocks,newpage,language,print,div',
        // removeButtons: 'Print,Form,TextField,Textarea,Button,CreateDiv,PasteText,PasteFromWord,Select,HiddenField,Radio,Checkbox,ImageButton,Anchor,BidiLtr,BidiRtl,Font,Format,Styles,Preview,Indent,Outdent',
        removeButtons: 'Save,NewPage,ExportPdf,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,About',

        toolbarGroups: [{
                name: 'document'
                , groups: ['mode', 'document', 'doctools']
            }
            , {
                name: 'clipboard'
                , groups: ['clipboard', 'undo']
            }
            , {
                name: 'editing'
                , groups: ['find', 'selection', 'spellchecker', 'editing']
            }
            , {
                name: 'forms'
                , groups: ['forms']
            }
            , {
                name: 'paragraph'
                , groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
            }
            , {
                name: 'links'
                , groups: ['links']
            }
            , {
                name: 'tools'
                , groups: ['tools']
            }
            , {
                name: 'basicstyles'
                , groups: ['basicstyles', 'cleanup']
            }
            , {
                name: 'styles'
                , groups: ['styles']
            }
            , {
                name: 'colors'
                , groups: ['colors']
            }
            , {
                name: 'insert'
                , groups: ['insert']
            }
            , {
                name: 'others'
                , groups: ['others']
            }
            , {
                name: 'about'
                , groups: ['about']
            }
        , ]
    , });

</script>
<script>
    function generateSlug() {
        var servicetitle = $('#servicetitle').val();
        const slugify =
            servicetitle
            .toLowerCase()
            .trim()
            .replace(/[^\w\s-]/g, '')
            .replace(/[\s_-]+/g, '-')
            .replace(/^-+|-+$/g, '');

        $('#slug').val(slugify);
    }

</script>
@endsection
