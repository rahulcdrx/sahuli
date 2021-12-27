@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.result.update", [$result->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.company.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($result) ? $result->name : '') }}" required>
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
                <label for="logo">Link</label>
                <input type="text" name="link" value="{{ old('link', isset($result) ? $result->link : '') }}" class="form-control">
            </div>
             <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
               
                <input type="hidden" name="post_date" value="{{ old('post_date', isset($result) ? $result->post_date : '') }}" class="form-control">
            </div>


            <div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
               <select class="form-control" id="exampleFormControlSelect1" name="result_category">
               
                <option value="student result"   {{ ($result->result_category) == 'student result' ? 'selected' : '' }}>Student Result</option>
                <option  value="govenment result"    {{ ($result->result_category) == 'govenment result' ? 'selected' : '' }}>Govenment Result </option>
               
                </select>

            </div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
