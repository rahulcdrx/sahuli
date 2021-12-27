@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Contact Us
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>ID </th>
                        <td>{{ $contact->id }} </td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <td>{{ $contact->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $contact->email }}</td>
                    </tr>
                    <tr>
                        <th>Mobile No</th>
                        <td> {{ $contact->mobile }}</td>
                    </tr>
                    <tr>
                        <th> Subject</th>
                        <td>{{ $contact->subject }}</td>
                    </tr>
                    <tr>
                        <th> Description</th>
                        <td>{{ $contact->description }}</td>
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
