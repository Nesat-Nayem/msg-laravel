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
                                <h2>Edit Subscription</h2>
                                <a href="{{ route('adminsubscription.index') }}" class="btn btn-primary" style="height: 34px; border-radius: 30px;"><i class="fa fa-arrow-left me-2"></i>Back</a>
                            </div>
                            <form action="{{route('adminsubscription.update', $subscription->id)}}" method="POST" autocomplete="on" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="service-fields mb-3">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="plan">Plan<span class="text-danger">*</span></label>
                                                <input value="{{ $subscription->plan }}" type="text" class="form-control @error('plan') is-invalid @enderror" name="plan" id="plan" placeholder="Enter Plan" required autofocus>
                                                @error('plan')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="startdate">Start Date<span class="text-danger">*</span></label>
                                                <input value="{{ $subscription->startdate }}" type="date" class="form-control @error('startdate') is-invalid @enderror" name="startdate" id="startdate" placeholder="Enter Start Date" required>
                                                @error('startdate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="enddate">End Date<span class="text-danger">*</span></label>
                                                <input value="{{ $subscription->enddate }}" type="date" class="form-control @error('enddate') is-invalid @enderror" name="enddate" id="enddate" placeholder="Enter End Date" required>
                                                @error('enddate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="amount">Amount<span class="text-danger">*</span></label>
                                                <input value="{{ $subscription->amount }}" type="number" class="form-control @error('amount') is-invalid @enderror" name="amount" id="amount" placeholder="Enter Amount" required>
                                                @error('amount')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <input type="radio" name="status" id="paid" class="ms-3 me-1" value="paid" {{ ($subscription->status=="paid")? "checked" : "" }}><label for="paid" class="me-2">Paid</label>
                                                <input type="radio" name="status" id="unpaid" class="me-1" value="unpaid" {{ ($subscription->status=="unpaid")? "checked" : "" }}><label for="unpaid">Unpaid</label>
                                                @error('status')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-start">
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
