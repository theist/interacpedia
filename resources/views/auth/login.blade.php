
@extends('app')

@section('highlight')
    <div class="container register-form">
        <div class="select-category text-center">
            <h2 class="text-center">Welcome back</h2>
        </div>
        <div class="panel panel-default col-md-6 col-md-offset-5">
            <div class="panel-body">
                <h3>Login</h3>
                <form action="{{ url('/auth/login') }}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if ($errors->has('email')) has-error @endif">
                        <label class="sr-only">E-Mail Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Email">
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        <label class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="remember" name="remember" > Remember Me
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <h5 class="center-block text-center">
                        <small><a class="" href="{{ url('/password/email') }}">Forgot Your Password?</a></small>
                        <hr/>
                        <small>Need to create an account? <a href="{{ url('/auth/register') }}">Sign Up</a></small>
                    </h5>
                </form>
            </div>
        </div>
    </div>
@endsection