@extends('app')

@section('title')
    {{ $course->name }}
    @parent
@stop

@section('meta')
    <meta property="og:title" content="{{ $course->name }}" />
    <meta property="og:url" content="http://www.interacpedia.com/courses/{{ $course->id }}" />
    <meta property="og:description" content="{{ $course->name }}" />
    <meta property="fb:app_id" content="1579172622347450" />
    <meta property="og:image" content="http://www.interacpedia.com{{ imagestyle('/images/courses/generic1.jpg','scale200x200') }}" />
    <meta property="og:image:width" content="200" />
    <meta property="og:image:height" content="200" />
    @parent
@stop

@section('content')
    <div class="row challenge full">
        <div class="col-md-6 main">
            <div class="content">
                <div class="row">
                    <div class="col-md-4">
                        <div class="gray_zone left">
                            <div class="image">
                                <img class="img-responsive" src="{{ imagestyle('/images/courses/generic1.jpg','scale200x200') }}"
                                     alt="{{ $course->name }}"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="gray_zone right">
                            <div class="name"><h1>{{ $course->name }}</h1></div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 20px">
                    <div class="col-md-12">
                        <div class="data2" style="position: relative">
                            <div class="col-md-12 legend">
                                Ingresa o Regístrate para conocer más
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 main">
            <div class="content">
                <div class="row">
                    <div class="col-md-12"><h3>@lang('auth/title.signup')</h3></div>
                    <div class="col-md-12">
                        <p class="lead">@lang('auth/messages.using_social')</p>
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
                            <hr/>
                            <div class="center-block text-center">
                                <small>By signing up you agree to our <a href="{{ action('PagesController@terms',[]) }}">Terms
                                        of Use</a> and <a href="{{ action('PagesController@privacy',[]) }}">Privacy Policy</a>.
                                </small>
                                <hr/>
                                <small>Already have an account? <a href="{{ url('/auth/login') }}">Log in</a></small>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop