@extends('app')

@section('title')
    @lang('auth/title.login')
    @parent
@stop

@section('highlight')
    <div class="container register-form">
        <div class="select-category text-center">
            <h2 class="text-center">@lang('general/messages.welcome')</h2>
        </div>
        <div class="panel panel-default col-md-12">
            <div class="panel-body">
                <h3>@lang('auth/title.login')</h3>
            </div>
            <div class="col-md-6">
                <p class="lead">
                    @lang('auth/messages.using_social')
                </blockquote>
                <div class="form-group">
                    <a href="/auth/facebook" type="submit" class="btn btn-primary btn-block facebook">
                        <i class="fa fa-facebook"></i>  @lang('auth/forms.login') @lang('auth/forms.with_facebook')
                    </a>
                </div>
                <div class="form-group">
                    <a href="/auth/linkedin" type="submit" class="btn btn-primary btn-block linkedin">
                        <i class="fa fa-linkedin-square"></i>  @lang('auth/forms.login') @lang('auth/forms.with_linkedin')
                    </a>
                </div>
                <div class="form-group">
                    <a href="/auth/twitter" type="submit" class="btn btn-primary btn-block twitter">
                        <i class="fa fa-twitter"></i>  @lang('auth/forms.login') @lang('auth/forms.with_twitter')
                    </a>
                </div>
                <div class="form-group">
                    <a href="/auth/google" type="submit" class="btn btn-primary btn-block google">
                        <i class="fa fa-google"></i>  @lang('auth/forms.login') @lang('auth/forms.with_google')
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <p class="lead">
                    @lang('auth/messages.prefer_credentials')
                </p>
                <form action="{{ url('/auth/login') }}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group @if ($errors->has('email')) has-error @endif">
                        <label class="sr-only">@lang('auth/forms.email')</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Email">
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        <label class="sr-only">@lang('auth/forms.password')</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                        @if ($errors->has('password')) <p
                                class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="remember" name="remember"> @lang('auth/forms.remember')
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> @lang('auth/forms.login')</button>
                    </div>
                    <h5 class="center-block text-center">
                        <small><a class="" href="{{ url('/password/email') }}">@lang('auth/forms.forgot')</a>
                        </small>
                        <hr/>
                        <small>@lang('auth/forms.needaccount') <a
                                    href="{{ url('/auth/register') }}">@lang('auth/forms.signup')</a></small>
                    </h5>
                </form>
            </div>
        </div>
    </div>
@endsection