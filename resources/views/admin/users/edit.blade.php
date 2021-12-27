@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>


    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
            @php
                Session::forget('success');
            @endphp
        </div>
    @endif

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                 @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" readonly>
                 @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
     

            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}" style="width:350px">
                <label for="start_date">{{ trans('cruds.user.fields.start_date') }}</label>
                <input type="date" id="first" name="start_date" class="form-control" value="{{ old('start_date', isset($user) ? $user->start_date : '') }}">
                @if ($errors->has('start_date'))
                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}" style="width:350px">
                <label for="end_date">{{ trans('cruds.user.fields.end_date') }}</label>
                <input type="date" id="second" name="end_date" class="form-control" value="{{ old('end_date', isset($user) ? $user->end_date : '') }}">
                @if ($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}" style="width:350px">
                <label for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                <input type="text" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', isset($user) ? $user->mobile : '') }}">
                 @if ($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif
            </div>

            <div class="form-group {{ $errors->has('aadhar') ? 'has-error' : '' }}" style="width:350px">
                <label for="aadhar">{{ trans('cruds.user.fields.aadhar') }}</label>
                <input type="text" id="aadhar" name="aadhar" class="form-control" value="{{ old('aadhar', isset($user) ? $user->aadhar : '') }}">
                 @if ($errors->has('aadhar'))
                    <span class="text-danger">{{ $errors->first('aadhar') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="logo">File/PDF</label><br>
                <input type="file" name="pdf_file" accept="application/pdf">
                @if ($errors->has('pdf_file'))
                    <span class="text-danger">{{ $errors->first('pdf_file') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label for="logo">File/Excel</label><br>
                <input type="file" name="excel_file" accept="application/vnd.ms-excel">
                @if($errors->has('excel_file'))
                    <em class="invalid-feedback">
                        {{ $errors->first('excel_file') }}
                    </em>
                @endif
            </div>       
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(()=>{
        jQuery('#first').change(()=>{

          var _date = jQuery('#first').val();

          var res = new Date(_date).setTime(new Date(_date).getTime() + (365 * 24 * 60 * 60 * 1000));
          var month = new Date(res).getMonth()+1;
          var day = new Date(res).getDate();
          var output = new Date(res).getFullYear() + '-' +
         (month < 10 ? '0' : '') + month + '-' +
          (day < 10 ? '0' : '') + day;

          jQuery('#second').val(output);

      })
      })
</script>
@endsection
