@extends('admin.layouts.app')
@section('content')
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Seller Balance</h3>
                </div>
            </div>
        </div>
        <!-- /Page Header -->


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0" id="example">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Provider Name</th>
                                        <th>Billing Amount</th>
                                        <th>Admin Commission</th>
                                        <th>Payable Amount</th>
                                        <th>Commission Percentage</th>
                                        <th>Transaction Date</th>
                                        <th>Service Name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $payment->service->provider->name }}</td>
                                            <td>{{ $payment->amount }}</td>
                                            <td>
                                                @php
                                                    $commission = ($payment->service->serviceamount * $payment->service->category->commission_percentage) / 100;
                                                @endphp
                                                {{ $commission }}
                                            </td>
                                            <td>
                                                @php
                                                    $commission = $payment->amount - ($payment->service->serviceamount * $payment->service->category->commission_percentage) / 100;
                                                @endphp
                                                {{ $commission }}
                                            </td>
                                            @if($payment->service->category->commission_percentage)
                                            <td>{{ $payment->service->category->commission_percentage }}</td>
                                            @else
                                            <td>0</td>
                                            @endif
                                            <td>{{ $payment->created_at->format('d M Y') }}</td>
                                            <td>{{ $payment->service->servicetitle }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
