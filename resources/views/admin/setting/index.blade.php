@extends('layouts.admin')

@section('content')



<div class="card">

    <div class="card-header">

        Setting

    </div>



    <div class="card-body">

        <form action="{{ route("admin.setting.store") }}" method="POST" enctype="multipart/form-data">

         @foreach($setting as $key => $settings)

            @csrf

            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">

                <label for="name">Name*</label>

                <input type="text" id="name" name="name" class="form-control" value="{{ $settings->name }}" required>

                @if($errors->has('name'))

                    <em class="invalid-feedback">

                        {{ $errors->first('name') }}

                    </em>

                @endif



            </div>

            <div class="form-group">

                <label for="logo">Logo</label><br>

                <input type="file" name="logo" value="{{ $settings->logo }}"><br>

                <img src="{{ asset('setting/'."$settings->logo") }}" >

                @if($errors->has('logo'))

                    <em class="invalid-feedback">

                        {{ $errors->first('logo') }}

                    </em>

                @endif



            </div>

             <div class="form-group">

                <label for="exampleFormControlSelect1">Phone Number</label>

              <input type="text" id="phone_no" name="phone_no" class="form-control" value="{{ $settings->phone_no }}" required>



            </div>

            <div class="form-group">

                <label for="exampleFormControlSelect1">Address </label>

              <input type="text" id="address" name="address" class="form-control" value="{{ $settings->address }}" required>



            </div>

            <div class="form-group">

                <label for="exampleFormControlSelect1">Email </label>

              <input type="text" id="email" name="email" class="form-control" value="{{ $settings->email }}" required>



            </div>

            @endforeach

            <div>

                <input class="btn btn-danger" type="submit" value="save">

            </div>

        </form>





    </div>

</div>

@endsection





