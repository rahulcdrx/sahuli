@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route(" admin.subscription.store") }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}" style="width:350px">
                <label for="name">{{ trans('cruds.subscription.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control"
                    value="{{ old('name', isset($sub) ? $sub->name : '') }}" required>
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.name_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}" style="width:350px">
                <label for="email">{{ trans('cruds.subscription.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control"
                    value="{{ old('email', isset($sub) ? $sub->email : '') }}" required>
                @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('start_date') ? 'has-error' : '' }}" style="width:350px">
                <label for="start_date">{{ trans('cruds.subscription.fields.start_date') }}</label>
                <input type="start_date" id="start_date" name="start_date" class="form-control" required>
                @if($errors->has('start_date'))
                <em class="invalid-feedback">
                    {{ $errors->first('start_date') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.subscription.fields.start_date_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}" style="width:350px">
                <label for="roles">{{ trans('cruds.user.fields.roles') }}*</label>
                <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                    @foreach($roles as $id => $roles)
                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->
                        roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
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
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>


    </div>
</div>
@endsection
