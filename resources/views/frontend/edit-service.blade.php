@extends('frontend.layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2>Edit Service</h2>
                    </div>
                    <form action="{{ route('updateservice', $service->slug) }}" method="POST" autocomplete="on"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="service-fields mb-3">
                            <h3 class="heading-2">Service Information</h3>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="servicetitle">Service Title<span class="text-danger">*</span></label>
                                        <input value="{{ $service->servicetitle }}" type="text"
                                            class="form-control @error('servicetitle') is-invalid @enderror"
                                            name="servicetitle" id="servicetitle" placeholder="Enter Service Title" required
                                            onkeyup="generateSlug();">
                                        @error('servicetitle')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <input value="{{ $service->slug }}" type="hidden"
                                    class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug"
                                    readonly>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="serviceamount">Service Amount<span class="text-danger">*</span></label>
                                        <input value="{{ $service->serviceamount }}" type="text"
                                            class="form-control @error('serviceamount') is-invalid @enderror"
                                            name="serviceamount" id="serviceamount" placeholder="Enter Service Amount"
                                            required>
                                        @error('serviceamount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="discount">Service Discount<span class="text-danger">*</span></label>
                                        <input value="{{ $service->discount }}" type="number"
                                            class="form-control @error('discount') is-invalid @enderror" name="discount"
                                            id="discount" placeholder="Enter Service Discount in %">
                                        @error('discount')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cashback">Service Cashback<span class="text-danger">*</span></label>
                                        <input value="{{ $service->cashback }}" type="number"
                                            class="form-control @error('cashback') is-invalid @enderror" name="cashback"
                                            id="cashback" placeholder="Enter Service Cashback in ₹">
                                        @error('cashback')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="country_id">Country<span class="text-danger">
                                                *</span></label>
                                        <select name="country_id" id="country_id"
                                            onchange="getStates('country_id','state_id','city_id');"
                                            class="w-100 form-select @error('country_id') is-invalid @enderror" required>
                                            <option value=""> - - Select Country - -
                                            </option>
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}"
                                                    @if ($service->country_id == $country->id) selected @endif>
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
                                        <select name="state_id" id="state_id" onchange="getCities('state_id', 'city_id');"
                                            class="w-100 form-select @error('state_id') is-invalid @enderror" required>
                                            <option value=""> - - Select State - -
                                            </option>
                                            @foreach ($states as $state)
                                                @if ($service->state_id == $state->id)
                                                    <option value="{{ $state->id }}" selected>
                                                        {{ $state->statename }}
                                                    </option>
                                                @endif
                                            @endforeach
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
                                            class="w-100 form-select @error('city_id') is-invalid @enderror" required>
                                            <option value=""> - - Select City -
                                                -
                                            </option>
                                            @foreach ($cities as $city)
                                                @if ($service->city_id == $city->id)
                                                    <option value="{{ $city->id }}" selected>
                                                        {{ $city->cityname }}
                                                    </option>
                                                @endif
                                            @endforeach
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
                            <h3 class="heading-2">Service Category</h3>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category<span class="text-danger">
                                                *</span></label>
                                        <select name="category_id" id="category_id"
                                            class="w-100 form-select @error('category_id') is-invalid @enderror" required
                                            onchange="getSubCategory('category_id', 'subcategory_id');">
                                            <option value=""> - - Select Category - -
                                            </option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($service->category_id == $category->id) selected @endif>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subcategory_id">Sub Category<span class="text-danger">
                                                *</span></label>
                                        <select name="subcategory_id" id="subcategory_id"
                                            class="w-100 form-select required @error('subcategory_id') is-invalid @enderror">
                                            <option value=""> - - Select Sub Category - - </option>
                                            @foreach ($subcategories as $subcategory)
                                                @if ($service->subcategory_id == $subcategory->id)
                                                    <option value="{{ $subcategory->id }}" selected>
                                                        {{ $subcategory->subcategoryname }}
                                                    </option>
                                                @endif
                                            @endforeach
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
                            <h3 class="heading-2">Service Offer</h3>
                            <div class="membership-info">
                                <div class="row form-row membership-cont">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="serviceoffer">Service Offered<span
                                                    class="text-danger">*</span></label>
                                            <input value="{{ $service->serviceoffer }}" type="text"
                                                class="form-control @error('serviceoffer') is-invalid @enderror"
                                                name="serviceoffer" id="serviceoffer" placeholder="Enter Service Offered"
                                                required>
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
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="service_image">Service Banner Image<span
                                                    class="text-danger">*</span></label>
                                            <input type="file"
                                                class="form-control @error('serviceimage') is-invalid @enderror"
                                                name="serviceimage" id="serviceimage">
                                            @error('serviceimage')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            @if ($service->serviceimage)
                                                <img src="{{ url('/images/admin/serviceimage/' . $service->serviceimage) }}"
                                                    width="100" height="100">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="service-fields mb-3">
                            <h3 class="heading-2">Details Information</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Descrptions<span class="text-danger">*</span></label>
                                        <textarea class="form-control ckeditor @error('description') is-invalid @enderror" rows="5" name="description"
                                            id="description" placeholder="Enter Description" required>{!! $service->description !!}</textarea>
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
                            <h3 class="heading-2">Service Gallery</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="service-upload">
                                        <i class="fas fa-cloud-upload-alt"></i>
                                        <span>Upload Service Images *</span>
                                        <input type="file"
                                            class="form-control @error('service_gallery') is-invalid @enderror"
                                            name="service_gallery[]" id="service_gallery" multiple>
                                        @error('service_gallery')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <ul class="upload-wrap">
                                            <li>
                                                <div class="row upload-images">
                                                    @isset($service->service_gallery)
                                                        <?php $arr_sg = json_decode($service->service_gallery, true); ?>
                                                        <div class="col-md-12 col-12 mb-3 alert alert-danger">
                                                            <label class="form-label">
                                                                <strong>Be Careful !!</strong> While updating, existing image
                                                                will not be
                                                                recovered.
                                                            </label>
                                                            <br>
                                                            @foreach ($arr_sg as $img)
                                                                <img src="{{ url('/images/admin/servicegallery/' . $img) }}"
                                                                    width="100" height="100">
                                                            @endforeach
                                                        </div>
                                                    @endisset
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" type="submit">
                                Update
                            </button>
                            <a href="{{ route('myservices') }}" class="btn btn-secondary submit-btn">
                                BACK
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- My CUSTOM CKEditor Integration -->
    <script src="{{ asset('admin/assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });

        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form',
            imageRemoveEvent: "",

            // removePlugins: 'blockquote,save,flash,iframe,tabletools,pagebreak,templates,about,showblocks,newpage,language,print,div',
            // removeButtons: 'Print,Form,TextField,Textarea,Button,CreateDiv,PasteText,PasteFromWord,Select,HiddenField,Radio,Checkbox,ImageButton,Anchor,BidiLtr,BidiRtl,Font,Format,Styles,Preview,Indent,Outdent',
            removeButtons: 'Save,NewPage,ExportPdf,Preview,Print,Templates,Form,Checkbox,Radio,TextField,Textarea,Select,Button,ImageButton,HiddenField,About',

            toolbarGroups: [{
                name: 'document',
                groups: ['mode', 'document', 'doctools']
            }, {
                name: 'clipboard',
                groups: ['clipboard', 'undo']
            }, {
                name: 'editing',
                groups: ['find', 'selection', 'spellchecker', 'editing']
            }, {
                name: 'forms',
                groups: ['forms']
            }, {
                name: 'paragraph',
                groups: ['list', 'indent', 'blocks', 'align', 'bidi', 'paragraph']
            }, {
                name: 'links',
                groups: ['links']
            }, {
                name: 'tools',
                groups: ['tools']
            }, {
                name: 'basicstyles',
                groups: ['basicstyles', 'cleanup']
            }, {
                name: 'styles',
                groups: ['styles']
            }, {
                name: 'colors',
                groups: ['colors']
            }, {
                name: 'insert',
                groups: ['insert']
            }, {
                name: 'others',
                groups: ['others']
            }, {
                name: 'about',
                groups: ['about']
            }, ],
        });
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
