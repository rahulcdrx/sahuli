@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Id</th>
                        <td> {{ $request->id }}</td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $request->name }}</td>
                    </tr>
                    <tr>
                     <th>Email</th>
                     <td>{{ $request->email }}</td>
                    </tr>  
                    <tr>
                        <th>Aadhar No.</th>
                        <td>{{ $request->aadhar_no}} </td>
                    </tr>                  
                    <tr>
                        <th> Mobile</th>
                        <td> {{ $request->mobile_no }} </td>
                    </tr>
                     <tr>                        
                        <th>Transaction No.</th>
                        <td> {{ $request->transaction_no ?? '' }} </td>
                     </tr>
                     <tr>     
                        <th>Transaction No.</th>
                        <td>  <img src="{{ asset('receipt/'."$request->trans_image") }}" width="250px" height="250px"> </td>
                    </tr>
                    <tr>
                        <th>Referral name</th>
                        <td> {{ $request->referal_name ?? '' }} </td>
                    </tr>
                </tbody>
            </table>
            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>
    </div>
</div>
@endsection
