@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.banner.update", [$banner->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.company.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($banner) ? $banner->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">{{ trans('cruds.company.fields.logo') }}</label><br>
                <input type="file" name="banner_img"  value="{{ old('banner_img', isset($banner) ? $banner->banner_img : '') }}">
                <br>
                <br>
                <img src="{{ asset('public/banner/'."$banner->banner_img") }}">
             
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.company.fields.logo_helper') }}
                </p>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"> Select Class</label>
               <select class="form-control" id="exampleFormControlSelect1" name="active">
               <option value="noactive" {{ ($banner->active) == 'noactive' ? 'selected' : '' }}>select</option>
                <option value="active" {{ ($banner->active) == 'active' ? 'selected' : '' }}>Active</option>
                
                
                </select>

            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

