@extends('layouts.app')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-8">

        <div class="card-group">

            <div class="card p-4">

                <div class="card-body">

                    @if(session()->has('message'))

                        <p class="alert alert-info">

                            {{ session()->get('message') }}

                        </p>

                    @endif

                    @if(session()->has('error'))

                    <p class="alert alert-danger">

                        {{ session()->get('error') }}

                    </p>

                @endif

                    <form method="POST" action="{{ route('login') }}">

                        {{ csrf_field() }}
                        <div class="text-center">
                        <img  src="{{asset('public/setting/Logo.png')}}" width="35">
                        </div>

                        <h1 class="text-center">{{ trans('panel.site_title') }}</h1>


                        <p class="text-center" style="font-size: 24px;">{{ trans('global.login') }}</p>



                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span class="input-group-text">

                                    <i class="fa fa-user"></i>

                                </span>

                            </div>

                            <input name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">

                            @if($errors->has('email'))

                                <div class="invalid-feedback">

                                    {{ $errors->first('email') }}

                                </div>

                            @endif

                        </div>



                        <div class="input-group mb-3">

                            <div class="input-group-prepend">

                                <span class="input-group-text"><i class="fa fa-lock"></i></span>

                            </div>

                            <input name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                            @if($errors->has('password'))

                                <div class="invalid-feedback">

                                    {{ $errors->first('password') }}

                                </div>

                            @endif

                        </div>



                        <!-- <div class="input-group mb-4">

                            <div class="form-check checkbox">

                                <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />

                                <label class="form-check-label" for="remember" style="vertical-align: middle;">

                                    {{ trans('global.remember_me') }}

                                </label>

                            </div>

                        </div> -->



                        <div class="row">

                            <div class="col-md-6">

                                <button type="submit" class="btn btn-primary px-4" style="background: #2E459C; border-color: #2E459C;">

                                    {{ trans('global.login') }}

                                </button>

                            </div>

                            <div class="col-md-6 text-right">

                                <a class="btn btn-link px-0" href="/requestform" style="color: #2E459C;">

                                   Don't have an account yet?

                                <button type="button" class="btn btn-primary" style="background: #2E459C; border-color: #2E459C;">Register</button></a>



                            </div>

                            

                        </div>
                        <div class="row">
                            <div class="col-md-4 text-left">

                                <a class="btn btn-link px-0" href="{{ route('password.request') }}" style="color: #2E459C;">

                                    {{ trans('global.forgot_password') }}

                                </a>



                            </div>
                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>



@endsection