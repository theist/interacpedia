@extends('app')

@section('title')
    @lang('auth/title.signup')
    @parent
@stop

@section('section-highlight')
    <div class="container register-form">
        <div class="select-category text-center">
            <h2 class="text-center">@lang('general/messages.welcome')</h2>
        </div>
        <div class="panel panel-default col-md-12">
            <div class="panel-body">
                <h3>@lang('auth/title.signup')</h3>
            </div>
            <div class="col-md-6">
                <p class="lead">
                    @lang('auth/messages.using_social')
                </p>
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
                <form action="{{ url('/auth/register') }}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group @if ($errors->has('name')) has-error @endif">
                        <label class="sr-only" for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}"
                               placeholder="Name">
                        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('email')) has-error @endif">
                        <label class="sr-only">E-Mail Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Email">
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('email_confirmation')) has-error @endif">
                        <label class="sr-only">Confirm E-Mail Address</label>
                        <input type="email" class="form-control" id="email_confirmation" name="email_confirmation"
                               placeholder="Re-enter email">
                        @if ($errors->has('email_confirmation')) <p class="help-block">{{ $errors->first('email_confirmation') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        <label class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                               placeholder="Password">
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>
                    <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
                        <label class="sr-only">Confirm Password</label>
                        <input type="password" class="form-control" id="password_confirmation"
                               name="password_confirmation"
                               placeholder="Confirm Password">
                        @if ($errors->has('password_confirmation')) <p class="help-block">{{ $errors->first('password_confirmation') }}</p> @endif
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="newsletter" name="newsletter" checked value="1"> Sign me up for weekly newsletter
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Create an Account
                        </button>
                    </div>
                </form>
            </div>
            <hr/>
            <h5 class="center-block text-center">

                <small>By signing up you agree to our <a href="{{ action('PagesController@terms',[]) }}">Terms
                        of Use</a> and <a href="{{ action('PagesController@privacy',[]) }}">Privacy Policy</a>.
                </small>
                <hr/>
                <small>Already have an account? <a href="{{ url('/auth/login') }}">Log in</a></small>
            </h5>
        </div>
    </div>
@endsection