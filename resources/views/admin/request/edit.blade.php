@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>
    <!-- .flash-message -->
    {{-- <div class="flash-message">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
          @if(Session::has('alert-' . $msg))
          <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
          @endif
        @endforeach
      </div> --}}
      @if(session('message'))
            {{session('message')}}
      @endif
    <div class="card-body">
        <form action="{{ route("admin.request.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" style="width:350px">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($request) ? $request->name : '') }}"  required>
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" style="width:350px">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($request) ? $request->email : '') }}" required>
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('trans_details') ? 'has-error' : '' }}" style="width:350px">
                <label for="trans_details">{{ trans('cruds.user.fields.trans_details') }}</label>
                <input type="trans_details" id="trans_details" name="trans_details" class="form-control" value="{{ old('trans_details', isset($request) ? $request->transaction_no : '') }}">
                @if($errors->has('trans_details'))
                    <em class="invalid-feedback">
                        {{ $errors->first('trans_details') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.trans_details_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}" style="width:350px">
                <label for="start_date">{{ trans('cruds.user.fields.start_date') }}</label>
                <input type="date" id="first" name="start_date" class="form-control" value="{{ old('start_date', isset($request) ? $request->start_date : '') }}">
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.start_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('end_date') ? 'has-error' : '' }}" style="width:350px">
                <label for="end_date">{{ trans('cruds.user.fields.end_date') }}</label>
                <input type="date" id="second" name="end_date" class="form-control" value="{{ old('end_date', isset($request) ? $request->end_date : '') }}">
                @if($errors->has('end_date'))
                    <em class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.end_date_helper') }}
                </p>
            </div>
           
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}" style="width:350px">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <em class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
                <em class="help-block">A minimum 8 characters password contains a combination of one <strong>uppercase</strong>, one <strong>lowercase</strong>, one<strong>number</strong>and one <strong>special character</strong>(!$#%^&*()@).</em>
            </div>
            {{--  <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">File/PDF</label><br>
                <input type="file" name="pdf_file">
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('logo') ? 'has-error' : '' }}">
                <label for="logo">File/Excel</label><br>
                <input type="file" name="pdf_file">
                @if($errors->has('logo'))
                    <em class="invalid-feedback">
                        {{ $errors->first('logo') }}
                    </em>
                @endif
            </div>  --}}
            <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}" style="width:350px">
                <label for="mobile">{{ trans('cruds.user.fields.mobile') }}</label>
                <input type="input" id="mobile" name="mobile" class="form-control" value="{{ old('mobile', isset($request) ? $request->mobile_no : '') }}">
                @if($errors->has('mobile'))
                    <em class="invalid-feedback">
                        {{ $errors->first('mobile') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.mobile_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('aadhar') ? 'has-error' : '' }}" style="width:350px">
                <label for="aadhar">{{ trans('cruds.user.fields.aadhar') }}</label>
                <input type="input" id="aadhar" name="aadhar" class="form-control" value="{{ old('aadhar', isset($request) ? $request->aadhar_no : '') }}">
                @if($errors->has('aadhar'))
                    <em class="invalid-feedback">
                        {{ $errors->first('aadhar') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.aadhar_helper') }}
                </p>
            </div>
            <!-- <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}" style="width:350px">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <em class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.roles_helper') }}
                </p>
            </div> -->
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