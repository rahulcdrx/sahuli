@extends('layouts.admin')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
  <div class="card-body" style="background: #FA1E1E;">
    <h2>{{$user}}</h2>
    <h4>Users</h4>
  </div>
</div>
        </div>
        <div class="col-md-3">
            <div class="card">
  <div class="card-body" style="background: springgreen;">
  <h2>{{$news}}</h2>
    <h4>News </h4>
  </div>
</div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background: #E8E80D;">
  <div class="card-body">
  <h2>{{$con_count}}</h2>
    <h4>Contact Us</h4>
  </div>
</div>
        </div>
        <div class="col-md-3">
            <div class="card" style="background: #32B7F0;">
  <div class="card-body">
  <h2>{{$alljob}}</h2>
    <h4>All Jobs</h4>
  </div>
</div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h3>Request Lists</h3>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User" style="margin: 0px">
                <thead>
                    <tr>
                     
                        <th> Sr No.</th>
                        <th> Name</th>
                        <th style="width: 5px"> Email</th>
                       
                        <th style="width: 10px"> Mobile No </th>
                     <!--    <th> Aadhar No</th> -->
                      <!-- 
                        <th> District</th>
                        <th> Taluka</th> -->
                      
                        <th style="width: 8px"> Transaction Image </th>
                        <th style="width: 8px">Transaction No </th>
                        <th style="width: 8px"> Referral Name </th>
                        <th> Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($request as $key => $requests)
                    <tr data-entry-id="{{ $requests->id }}">
                       
                        <td> {{ $requests->id ?? '' }}</td>
                        <td>{{ $requests->name ?? '' }}</td>
                        <td> {{ $requests->email ?? '' }} </td>
                       
                        <td> {{ $requests->mobile_no ?? '' }}</td>
                      <!--   <td> {{ $requests->aadhar_no ?? '' }} </td> -->
                     
                     <!--    <td> {{ $requests->district ?? '' }} </td>
                        <td> {{ $requests->taluka ?? '' }} </td> -->
                     
                        <td> <img src="{{ asset('receipt/'.$requests->trans_image) }}" width="75" height="75"> </td>
                        <td> {{ $requests->transaction_no ?? '' }} </td>
                        <td> {{ $requests->referal_name ?? '' }} </td>
                        <td>
                            <a class="btn btn-xs btn-primary" href="{{ route('admin.request.show', $requests->id) }}" style="width: 40px; font-size: 9px;">
                                {{ trans('global.view') }}
                            </a>
                            <form action="{{ route('admin.request.destroy', $requests->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="Reject" style="width: 40px; font-size: 8px;">
                            </form>

                            <a class="btn btn-xs btn-primary" href="{{ route('admin.request.edit', $requests->id) }}" style="width: 40px; font-size: 9px;">
                                {{ trans('global.add') }}
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table><br>
           <center><a href="{{ route("admin.request.index") }}"><button class="btn btn-primary ">View More</button></a></center> 
        </div>
    </div>
</div>
<div class="card">
 <div class="card-header">
        <h3>Contact  List</h3>
    </div>
   <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User" style="margin:0px">
                <thead>
                    <tr>
                      
                        <th>
                            Sr No.
                        </th>
                        <th>
                            Name
                        </th>
                        <th>
                            Email
                        </th>
                        <th>
                            Mobile
                        </th>
                        <th>
                            Subject
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contact as $key => $contacts)
                        <tr data-entry-id="{{ $contacts->id }}">
                        
                            <td>
                                {{ $contacts->id ?? '' }}
                            </td>
                            <td>
                                {{ $contacts->name ?? '' }}
                            </td>
                            <td>
                                {{ $contacts->email ?? '' }}
                            </td>
                            <td>
                               {{ $contacts->mobile ?? '' }}
                            </td>
                            <td>
                                {{ $contacts->subject ?? '' }}
                             </td>
                             <td>
                                {{ $contacts->description ?? '' }}
                             </td>
                            <td>
                                @can('user_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.contactus.show', $contacts->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @can('user_delete')
                                    <form action="{{ route('admin.contactus.destroy', $contacts->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Reject">
                                    </form>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br>
            <center><a href="{{ route("admin.contactus.index") }}"><button class="btn btn-primary ">View More</button></a></center> 
        </div>
    </div>
    </div>
@endsection
@section('scripts')
@parent

@endsection