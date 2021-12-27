@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Show Bank Details
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Id</th>
                        <td>{{ $payment->id }}</td>
                    </tr>
                    <tr>
                        <th>GPAY</th>
                        <td>{{ $payment->GPAY }}</td>
                    </tr>
                    <tr>
                        <th>Account</th>
                        <td>{{ $payment->bank_acc }}</td>
                    </tr>
                    <tr>
                        <th>IFSC</th>
                        <td>{{ $payment->ifsc }}</td>
                    </tr>
                    <tr>
                        <th>Branch</th>
                        <td>{{ $payment->branch }}</td>
                    </tr>
                    <tr>
                        <th>QR</th>
                        <td> {{$payment->QR_image}}   </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                Back
            </a>
        </div>

        <nav class="mb-3">
            <div class="nav nav-tabs">

            </div>
        </nav>
        <div class="tab-content">

        </div>
    </div>
</div>
@endsection
