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
                                    <h2>Edit State</h2>
                                    <a href="{{ route('admin-state.index') }}" class="btn btn-primary"
                                        style="height: 34px; border-radius: 30px;"><i
                                            class="fa fa-arrow-left me-2"></i>Back</a>
                                </div>
                                <form action="{{ route('admin-state.update', $state->id) }}" method="POST"
                                    autocomplete="on" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="service-fields mb-3">
                                        <div class="row">
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="name">Country Name<span class="text-danger">
                                                            *</span></label>
                                                    <select name="country_id" id="country_id"
                                                        class="w-100 form-select required @error('country_id') is-invalid @enderror">
                                                        <option value=""> - - Select Country - -
                                                        </option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}"
                                                                @if ($state->country_id == $country->id) selected @endif>
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
                                            <div class="col-md-6 col-12">
                                                <div class="form-group">
                                                    <label for="statename">State Name<span
                                                            class="text-danger">*</span></label>
                                                    <input value="{{ $state->statename }}" type="text"
                                                        class="form-control @error('statename') is-invalid @enderror"
                                                        name="statename" id="statename" placeholder="State Name" required
                                                        autofocus>
                                                    @error('statename')
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
@endsection
