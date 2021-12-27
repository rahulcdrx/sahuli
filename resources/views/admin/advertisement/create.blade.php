@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
       Advertisement
    </div>

    <div class="card-body">
        <form action="{{ route("admin.advertisement.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($advertisement) ? $advertisement->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif

            </div>
            <div class="form-group">
                <label for="logo">Logo</label><br>
                <input type="file" name="advt_image">
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif

            </div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
               <select class="form-control" id="exampleFormControlSelect1" name="advt_category">
                <option value="top right">Top Right</option>
                <option  value="top left">Top Left</option>
                <option  value="down right">Down Right</option>
                <option  value="down left">Down Left</option>
                 
                </select>

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"> Select Class</label>
               <select class="form-control" id="exampleFormControlSelect1" name="active">
               <option value="noactive">select</option>
                <option value="active">Active</option>
                
                
                </select>

            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>
        </form>


    </div>
</div>
@endsection


