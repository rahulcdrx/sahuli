@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card-group">

            <div class="card p-4">

                <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                    <form method="POST" action="{{ route('password.email') }}">

                        {{ csrf_field() }}
                        <div class="text-center">
                        <img  src="{{asset('public/setting/Logo.png')}}" width="35">
                        </div>

                        <h1 class="text-center">{{ trans('panel.site_title') }}</h1>

                        

                        <p class="text-muted"></p>

                        <div>

                            {{ csrf_field() }}

                            <div class="form-group has-feedback">

                                <input type="email" name="email" class="form-control" required="autofocus" placeholder="{{ trans('global.login_email') }}">

                                @if($errors->has('email'))

                                    <em class="invalid-feedback">

                                        {{ $errors->first('email') }}

                                    </em>

                                @endif

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-12 text-right">

                                <button type="submit" class="btn btn-primary btn-block btn-flat" style="background: #2E459C; border-color: #2E459C;">

                                    {{ trans('global.reset_password') }}

                                </button>

                            </div>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection