@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.advertisement.update", [$advertisement->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.company.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($advertisement) ? $advertisement->name : '') }}" required>
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
                <label for="logo">{{ trans('cruds.company.fields.logo') }}</label>
               <input type="file" name="advt_image"  value="{{ old('advt_image', isset($advertisement) ? $advertisement->advt_image : '') }}">
                <br>
                <br>
                <img src="{{ asset('public/advertisement/'."$advertisement->advt_image") }}">
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
                <label for="exampleFormControlSelect1">Select Category</label>
               <select class="form-control" id="exampleFormControlSelect1" name="advt_category">
               
                <option value="top right"   {{ ($advertisement->advt_category) == 'top right' ? 'selected' : '' }}>Top Right</option>
                <option  value="top left"    {{ ($advertisement->advt_category) == 'top left' ? 'selected' : '' }}>Top Left</option>
                <option  value="down right" {{ ($advertisement->advt_category) == 'down right' ? 'selected' : '' }} >Down Right</option>
                <option  value="down left"  {{ ($advertisement->advt_category) == 'down left' ? 'selected' : '' }} >Down Left</option>
                 
                </select>

            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1"> Select Class</label>
               <select class="form-control" id="exampleFormControlSelect1" name="active">
               <option value="noactive" {{ ($advertisement->active) == 'noactive' ? 'selected' : '' }}>select</option>
                <option value="active" {{ ($advertisement->active) == 'active' ? 'selected' : '' }}>Active</option>
                
                
                </select>

            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection

