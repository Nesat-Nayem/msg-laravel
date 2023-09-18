@extends('frontend.layouts.app')
@section('head')
    <style>
        .close {
            border: none;
            background: none;
            font-size: 30px;
        }
    </style>
@endsection
@section('content')
    <div class="content">
        @include('toastr')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="section-header text-center">
                        <h2>Book Service</h2>
                    </div>
                    <form action="{{ route('UserDetails') }}" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-6">
                                <input class="form-control" type="hidden" value="{{ $service->id }}" name="service_id"
                                    id="service_id" />
                                <input class="form-control" type="hidden" value="{{ $service->slug }}" id="service_slug" />
                                <div class="form-group">
                                    <label for="servicelocation">Service Location
                                        <span class="text-danger">*</span></label>
                                    <select name="servicelocation" id="servicelocation"
                                        class="w-100 form-select @error('servicelocation') is-invalid @enderror" required>
                                        <option value=""> - - Select Location - -
                                        </option>
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ old('servicelocation') == $city->id ? 'selected' : '' }}>
                                                {{ $city->cityname }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('servicelocation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="serviceamount">Service amount</label>
                                    @if ($service->rate)
                                        <input
                                            class="serviceamount form-control @error('serviceamount') is-invalid @enderror"
                                            type="text" name="serviceamount" id="serviceamount"
                                            value="{{ $service->rate }}" readonly />
                                    @elseif($service->totalamount)
                                        <input
                                            class="serviceamount form-control @error('serviceamount') is-invalid @enderror"
                                            type="text" name="serviceamount" id="serviceamount"
                                            value="{{ $service->totalamount }}" readonly />
                                    @else
                                        <input
                                            class="serviceamount form-control @error('serviceamount') is-invalid @enderror"
                                            type="text" name="serviceamount" id="serviceamount"
                                            value="{{ $service->serviceamount }}" readonly />
                                    @endif
                                    @error('serviceamount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="service_date">Date <span class="text-danger">*</span></label>
                                    <input class="form-control hasDatepicker @error('service_date') is-invalid @enderror"
                                        name="service_date" id="service_date" type="date" />
                                    @error('service_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="service_timeslot">Time slot <span class="text-danger">*</span></label>
                                    <select name="service_timeslot" id="service_timeslot"
                                        class="w-100 form-select @error('service_timeslot') is-invalid @enderror" required>
                                        @if ($service->provider->from_time != null && $service->provider->to_time)
                                            <option value=""> - - Select Time Slot - -
                                            </option>
                                            @for ($count1 = 1, $count2 = 1; $count1 < count($ftime), $count2 < count($ttime); $count1++, $count2++)
                                                <option value="{{ $ftime[$count1] }} - {{ $ttime[$count2] }}">
                                                    {{ $ftime[$count1] }} -
                                                    {{ $ttime[$count2] }}
                                                </option>
                                            @endfor
                                        @else
                                            <option value=""> - - Select Time Slot - -
                                            </option>
                                        @endif
                                    </select>
                                    @error('service_timeslot')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="text-center">
                                        <div id="load_div"></div>
                                    </div>
                                    <label for="service_notes">Notes</label>
                                    <textarea class="form-control @error('service_notes') is-invalid @enderror" name="service_notes" id="service_notes"
                                        rows="5"></textarea>
                                    @error('service_notes')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="payment">Payment</label>
                                    <input type="checkbox" name="payment" id="payment" class="payment me-1" value="wallet"
                                        style="margin-left: 37px;"><label for="wallet" class="me-2">Adjust
                                        Wallet</label>
                                    @error('payment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label for="grandtotal">Grand Total</label>
                                    <input type="text" id="grandtotal" class="form-control grandtotal me-1" readonly>
                                    @error('payment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn" id="rzp-button1" type="submit">
                                Continue to Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
        var temp;
        $('body').on('click', '#rzp-button1', function(e) {
            e.preventDefault();

            var grandtotal = $('.grandtotal').val();
            var service_id = $('#service_id').val();
            var service_slug = $('#service_slug').val();
            var servicelocation = $('#servicelocation').val();
            var serviceamount = $('#serviceamount').val();
            var service_date = $('#service_date').val();
            var service_timeslot = $('#service_timeslot').val();
            var service_notes = $('#service_notes').val();
            var user_wallet = $('#user_wallet').val();
            var payment = $('#payment').val();

            if (grandtotal == '' || grandtotal == null) {
                var amount = $('.serviceamount').val();
                var total_amount = amount * 100;
                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}",
                    "amount": total_amount.toFixed(
                        2
                    ),
                    "currency": "INR",
                    "name": "Buy Lokaly",
                    "description": "Payment",
                    "handler": function(response) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('UserDetails') }}",
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                amount: amount,
                                service_id: service_id,
                                servicelocation: servicelocation,
                                serviceamount: serviceamount,
                                service_date: service_date,
                                service_timeslot: service_timeslot,
                                service_notes: service_notes,
                                payment: payment,
                                user_wallet,
                                user_wallet,
                                temp: temp,
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.options = {
                                        "closeButton": false,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": false,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "6000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    }
                                    toastr.success(response.msg, "Success");
                                    window.location.href = "{{ url('/servicedetails') }}/" +
                                        service_slug
                                } else {
                                    toastr.error(response.msg, "Error");
                                }
                            }
                        });
                    },
                    "theme": {
                        "color": "#036CB5"
                    },
                }
                var rzp1 = new Razorpay(options);
                rzp1.open();
            } else if (grandtotal == '0') {
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('UserDetails') }}",
                    data: {
                        _token: CSRF_TOKEN,
                        service_id: service_id,
                        servicelocation: servicelocation,
                        serviceamount: serviceamount,
                        service_date: service_date,
                        service_timeslot: service_timeslot,
                        service_notes: service_notes,
                        user_wallet: user_wallet,
                        payment: payment,
                        temp: temp,
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.options = {
                                "closeButton": false,
                                "debug": false,
                                "newestOnTop": false,
                                "progressBar": false,
                                "positionClass": "toast-top-right",
                                "preventDuplicates": false,
                                "onclick": null,
                                "showDuration": "300",
                                "hideDuration": "1000",
                                "timeOut": "6000",
                                "extendedTimeOut": "1000",
                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut"
                            }
                            toastr.success(response.msg, "Success");
                            window.location.href = "{{ url('/servicedetails') }}/" + service_slug
                        } else {
                            toastr.error(response.msg, "Error");
                        }
                    }
                });
            } else {

                var amount = $('#grandtotal').val();
                var total_amount = amount * 100;
                var options = {
                    "key": "{{ env('RAZORPAY_KEY') }}",
                    "amount": total_amount.toFixed(
                        2
                    ),
                    "currency": "INR",
                    "name": "Buy Lokaly",
                    "description": "Payment",
                    "handler": function(response) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: "{{ route('UserDetails') }}",
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id,
                                amount: amount,
                                service_id: service_id,
                                servicelocation: servicelocation,
                                serviceamount: serviceamount,
                                service_date: service_date,
                                service_timeslot: service_timeslot,
                                service_notes: service_notes,
                                payment: payment,
                                user_wallet: user_wallet,
                                temp: temp,
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.options = {
                                        "closeButton": false,
                                        "debug": false,
                                        "newestOnTop": false,
                                        "progressBar": false,
                                        "positionClass": "toast-top-right",
                                        "preventDuplicates": false,
                                        "onclick": null,
                                        "showDuration": "300",
                                        "hideDuration": "1000",
                                        "timeOut": "6000",
                                        "extendedTimeOut": "1000",
                                        "showEasing": "swing",
                                        "hideEasing": "linear",
                                        "showMethod": "fadeIn",
                                        "hideMethod": "fadeOut"
                                    }
                                    toastr.success(response.msg, "Success");
                                    window.location.href = "{{ url('/servicedetails') }}/" +
                                        service_slug
                                } else {
                                    toastr.error(response.msg, "Error");
                                }
                            }
                        });
                    },
                    "theme": {
                        "color": "#036CB5"
                    },
                }
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }

        });
    </script>

    <script>
        $('.payment').on('click onload', function(e) {
            var checkbox = $('input[name="payment"]:checked').val()
            var serviceamount = parseFloat($('.serviceamount').val());
            if (checkbox == 'wallet') {

                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    type: 'POST',
                    url: "{{ route('adjust.wallet') }}",
                    data: {
                        _token: CSRF_TOKEN,
                        serviceamount: serviceamount,
                    },
                    success: function(response) {
                        if (response.success) {
                            $('#grandtotal').val(response.grandtotal);
                            temp = response.u_wallet;
                        } else {
                            toastr.error(response.msg, "Error");
                        }
                    }
                });

            } else {

                window.location.reload();

            }

        });
    </script>
@endsection
