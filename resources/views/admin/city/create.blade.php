@extends('admin.layouts.app')
@section('head')
<!-- Datepicker CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-datetimepicker.min.css') }}">
<!-- Datatables CSS -->
<link rel="stylesheet" href="{{ asset('admin/assets/plugins/datatables/datatables.min.css') }}">
@endsection
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
                                <h2>Add City</h2>
                                <a href="{{ route('admin-city.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{ route('admin-city.store') }}" method="POST" autocomplete="on" enctype="multipart/form-data">
                                @csrf
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="country_id">Country Name<span class="text-danger">
                                                        *</span></label>
                                                <select name="country_id" id="country_id" class="w-100 form-select required autofocus @error('country_id') is-invalid @enderror" onchange="getStates('country_id','state_id');">
                                                    <option value=""> - - Select Country - -
                                                    </option>
                                                    @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}" {{ old('country_id') == $country->id ? 'selected' : '' }}>
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
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="state_id">State Name<span class="text-danger">
                                                        *</span></label>
                                                <select name="state_id" id="state_id" class="w-100 form-select required @error('state_id') is-invalid @enderror">
                                                    <option value=""> - - Select State - - </option>
                                                </select>
                                                @error('state_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-group">
                                                <label for="cityname">City Name<span class="text-danger">*</span></label>
                                                <input value="{{ old('cityname') }}" type="text" class="form-control @error('cityname') is-invalid @enderror" name="cityname" id="cityname" placeholder="Enter City Name" required autofocus>
                                                @error('cityname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="submit-section text-start">
                                        <button class="btn btn-primary submit-btn" type="submit">
                                            Submit
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
<!-- Datepicker Core JS -->
<script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- Datatables JS -->
<script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/datatables.min.js') }}"></script>

<script>
    function getStates(country_id, state_id) {
        var country = document.getElementById(country_id).value;
        var StateField = document.getElementById(state_id);
        if (country) {
            $.ajax({
                type: "GET"
                , url: "{{ url('/getStateFromCountry') }}/" + country
                , success: function(data) {
                    StateField.options.length = 0;
                    $(StateField).append('<option value=""> - - Select State - - </option>');
                    for (var i in data) {
                        $(StateField).append('<option value=' + data[i].id + '>' + data[i]
                            .statename + '</option>');
                    }
                }
            });
        } else {
            StateField.options.length = 0;
            $(StateField).append('<option value=""> - - Select State - - </option>');
        }
    }

</script>
@endsection
