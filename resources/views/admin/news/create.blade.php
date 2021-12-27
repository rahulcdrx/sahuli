@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.company.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.news.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">Name*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($news) ? $news->name : '') }}" required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif

            </div>
            <div class="form-group">
                <label for="logo">News Area</label><br>
                <input type="text" name="newsarea" class="form-control" required>
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif

            </div>
             <div class="form-group">
                <label for="exampleFormControlSelect1">Select Category</label>
               <select class="form-control" id="exampleFormControlSelect1" name="news_category" required>
                <option value="job news">Job News</option>
                <option  value="student news">Student News </option>
               
                 
                </select>

            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="save">
            </div>
        </form>


    </div>
</div>
@endsection


