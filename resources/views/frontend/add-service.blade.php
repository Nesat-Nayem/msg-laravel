@extends('frontend.layouts.app')
@section('head')
    <style>
        .sidebar {
            background-color: #016bb5;
        }

        .widget {
            color: white !important;
        }

        .settings-menu ul li a {
            color: #fff;
            padding: 0;
            border: 0 !important;
            display: inline-block;
        }

        .nav-link:focus,
        .nav-link:hover {
            color: #ff6800;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        <div class="container">
            @include('toastr')
            <div class="row">
                <div class="col-xl-3 col-md-4 sidebar pt-3">
                    <div class="mb-4">
                        <div class="d-sm-flex flex-row flex-wrap text-center text-sm-start align-items-center">
                            @if ($provider->profileimage != '' || $provider->profileimage != null)
                                <img alt="profile image"
                                    src="{{ url('/images/admin/providerprofileimage/' . $provider->profileimage) }}"
                                    class="avatar-lg rounded-circle" />
                            @else
                                <img alt="profile image"
                                    src="{{ url('/images/admin/generalsettings/' . $generalsetting->profile_placeholder) }}"
                                    class="avatar-lg rounded-circle" />
                            @endif
                            <div class="ms-sm-3 ms-md-0 ms-lg-3 mt-2 mt-sm-0 mt-md-2 mt-lg-0">
                                <h6 class="text-white mb-0">{{ $provider->name }}</h6>
                                <p class="text-white mb-0">Member Since {{ $provider->created_at->format('M Y') }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="widget settings-menu">
                        <ul>
                            <li class="nav-item">
                                <a href="{{ route('providerdashboard') }}" class="nav-link">
                                    <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('myservices') }}" class="nav-link active">
                                    <i class="far fa-address-book"></i>
                                    <span>My Services</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providerbookings') }}" class="nav-link">
                                    <i class="far fa-calendar-check"></i>
                                    <span>Booking List</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providersettings', $provider->id) }}" class="nav-link">
                                    <i class="far fa-user"></i> <span>Profile Settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providerwallet') }}" class="nav-link">
                                    <i class="far fa-money-bill-alt"></i> <span>Wallet</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providersubscription') }}" class="nav-link">
                                    <i class="far fa-calendar-alt"></i>
                                    <span>Subscription</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('provideravailability') }}" class="nav-link">
                                    <i class="far fa-clock"></i> <span>Availability</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providerreviews') }}" class="nav-link">
                                    <i class="far fa-star"></i> <span>Reviews</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('providerpayment') }}" class="nav-link">
                                    <i class="fas fa-hashtag"></i> <span>Payment</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-md-8">
                    <h4 class="widget-title service">My Services</h4>
                    <ul class="nav nav-tabs menu-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('myservices') }}">Active Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inactive.services') }}">Inactive Services</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('addservice') }}">Add Service</a>
                        </li>
                    </ul>

                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <form action="{{ route('servicestore') }}" method="POST" autocomplete="on"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="service-fields mb-3">
                                    <h3 class="heading-2">Service Information</h3>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="servicetitle">Service Title<span
                                                        class="text-danger">*</span></label>
                                                <input value="{{ old('servicetitle') }}" type="text"
                                                    class="form-control @error('servicetitle') is-invalid @enderror"
                                                    name="servicetitle" id="servicetitle" placeholder="Enter Service Title"
                                                    required onkeyup="generateSlug();">
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
                                                <label for="discount">Service Discount<span
                                                        class="text-danger">*</span></label>
                                                <input value="{{ old('discount') }}" type="number"
                                                    class="form-control @error('discount') is-invalid @enderror"
                                                    name="discount" id="discount"
                                                    placeholder="Enter Service Discount in %">
                                                @error('discount')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="cashback">Service Cashback<span
                                                        class="text-danger">*</span></label>
                                                <input value="{{ old('cashback') }}" type="number"
                                                    class="form-control @error('cashback') is-invalid @enderror"
                                                    name="cashback" id="cashback"
                                                    placeholder="Enter Service Cashback in ₹">
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
                                                    class="w-100 form-select @error('country_id') is-invalid @enderror"
                                                    required>
                                                    <option value=""> - - Select Country - -
                                                    </option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}"
                                                            {{ old('country_id') == $country->id ? 'selected' : '' }}>
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
                                    <h3 class="heading-2">Service Category</h3>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="category_id">Category<span class="text-danger">
                                                        *</span></label>
                                                <select name="category_id" id="category_id"
                                                    class="w-100 form-select @error('category_id') is-invalid @enderror"
                                                    required onchange="getSubCategory('category_id', 'subcategory_id');">
                                                    <option value=""> - - Select Category - -
                                                    </option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                            {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                    <h3 class="heading-2">Service Offer</h3>
                                    <div class="membership-info">
                                        <div class="row form-row membership-cont">
                                            <div class="col-md-12">
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
                                    <h3 class="heading-2">Details Information</h3>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="description">Descrptions<span
                                                            class="text-danger">*</span></label>
                                                    <textarea class="form-control ckeditor @error('description') is-invalid @enderror" name="description"
                                                        id="description" placeholder="Enter Description" required>{{ old('description') }}</textarea>
                                                    @error('description')
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
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-section">
                                    <button class="btn btn-primary submit-btn me-2" type="submit">
                                        Submit
                                    </button>
                                    <button class="btn btn-secondary submit-btn" type="reset">
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

    <div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <a href="javascript:;" class="btn btn-success si_accept_confirm">Yes</a>
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteNotConfirmModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="acc_title">Inactive Service?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Service is Booked and Inprogress..</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger si_accept_cancel" data-dismiss="modal">
                        OK
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <!-- Sticky Sidebar JS -->
    <script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/ResizeSensor.js') }}"></script>
    <script src="{{ asset('frontend/assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js') }}"></script>

    <script>
        function getStates(country_id, state_id, city_id) {
            var country = document.getElementById(country_id).value;
            var StateField = document.getElementById(state_id);
            var CityField = document.getElementById(city_id);
            if (country) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('/getStateFromCountry') }}/" + country,
                    success: function(data) {
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
                    type: "GET",
                    url: "{{ url('/getCityFromState') }}/" + state,
                    success: function(data) {
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
                    type: "GET",
                    url: "{{ url('/getSubCategoryFromCategory') }}/" + category,
                    success: function(data) {
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
