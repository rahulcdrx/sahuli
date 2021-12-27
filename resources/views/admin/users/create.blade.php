@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
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
        <form action="{{ route("admin.users.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group" style="width:350px">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" required>
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
              
            </div>
            <div class="form-group" style="width:350px">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter email" required>
                @if($errors->has('email'))
                    <span class="text-danger">
                        {{ $errors->first('email') }}
                    </span>
                @endif             
            </div>


            <div class="form-group" style="width:350px">
                <label for="trans_details">{{ trans('cruds.user.fields.trans_details') }}</label>
                <input type="trans_details" id="trans_details" name="trans_details" class="form-control" placeholder="Transaction Details">
                @if($errors->has('trans_details'))
                    <span class="text-danger">
                        {{ $errors->first('trans_details') }}
                    </span>
                @endif
              
            </div>
            <div class="form-group" style="width:350px">
                <label for="start_date">{{ trans('cruds.user.fields.start_date') }}</label>
                <input type="date" id="first" name="start_date" class="form-control" required>
                @if($errors->has('start_date'))
                    <span class="text-danger">
                        {{ $errors->first('start_date') }}
                    </span>
                @endif
               
            </div>

            <div class="form-group" style="width:350px">
                <label for="end_date">{{ trans('cruds.user.fields.end_date') }}</label>
                <input type="date" id="second" name="end_date" class="form-control"  required>
                @if($errors->has('end_date'))
                    <span class="text-danger">
                        {{ $errors->first('end_date') }}
                    </span>
                @endif
               
            </div>           

            <div class="form-group" style="width:350px">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control" required>
                @if($errors->has('password'))
                    <span class="text-danger">
                        {{ $errors->first('password') }}
                    </span>
                @endif
               
               <em class="help-block">A minimum 8 characters password contains a combination of one <strong>uppercase</strong>, one <strong>lowercase</strong>, one<strong>number</strong>and one <strong>special character</strong>(!$#%^&*()@).</em>
            </div>


            <div class="form-group" style="width:350px">
                <label for="mobile">Mobile</label>
                <input type="input" id="mobile" name="mobile" class="form-control" placeholder="Enter Mobile no">
                @if ($errors->has('mobile'))
                    <span class="text-danger">{{ $errors->first('mobile') }}</span>
                @endif

            </div>

            <div class="form-group" style="width:350px">
                <label for="aadhar">Aadhar</label>
                <input type="input" id="aadhar" name="aadhar" class="form-control" placeholder="Enter aadhar no" required>
                 @if ($errors->has('aadhar'))
                    <span class="text-danger">{{ $errors->first('aadhar') }}</span>
                 @endif

            </div>

            <!--<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}" style="width:350px">-->
            <!--    <label for="roles">{{ trans('cruds.user.fields.roles') }}</label>-->
            <!--    <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>-->
            <!--        @foreach($roles as $id => $roles)-->
            <!--            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>-->
            <!--        @endforeach-->
            <!--    </select>-->
            <!--    @if($errors->has('roles'))-->
            <!--        <em class="invalid-feedback">-->
            <!--            {{ $errors->first('roles') }}-->
            <!--        </em>-->
            <!--    @endif-->
            <!--    <p class="helper-block">-->
            <!--        {{ trans('cruds.user.fields.roles_helper') }}-->
            <!--    </p>-->
            <!--</div>-->
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
