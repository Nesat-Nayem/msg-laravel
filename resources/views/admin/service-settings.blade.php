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
            <h3 class="page-title">Service Settings</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <form>
                            <div class="form-group">
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Review Details</h6>
                                    <input type="checkbox" id="status_1" class="check" />
                                    <label for="status_1" class="checktoggle">checkbox</label>
                                </div>
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Booking Service</h6>
                                    <input type="checkbox" id="status_2" class="check" />
                                    <label for="status_2" class="checktoggle">checkbox</label>
                                </div>
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Service Offered</h6>
                                    <input type="checkbox" id="status_3" class="check" />
                                    <label for="status_3" class="checktoggle">checkbox</label>
                                </div>
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Service Availability</h6>
                                    <input type="checkbox" id="status_4" class="check" />
                                    <label for="status_4" class="checktoggle">checkbox</label>
                                </div>
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Provider Email</h6>
                                    <input type="checkbox" id="status_5" class="check" />
                                    <label for="status_5" class="checktoggle">checkbox</label>
                                </div>
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Provider Mobile no.</h6>
                                    <input type="checkbox" id="status_6" class="check" />
                                    <label for="status_6" class="checktoggle">checkbox</label>
                                </div>
                                <div class="status-toggle d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="mb-0">Provider Status</h6>
                                    <input type="checkbox" id="status_7" class="check" />
                                    <label for="status_7" class="checktoggle">checkbox</label>
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
