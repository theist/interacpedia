@extends('app')

@section('title')
    @lang('auth/title.signup')
    @parent
@stop

@section('highlight')
    <div class="container register-form">
        <div class="select-category text-center">
            <h2 class="text-center">Select your Category</h2>
            <ul>
                <li class="text-center inactive" data-value="students"><img src="/images/icons/profiles/icon-students.png"><br>Students</li>
                <li class="text-center inactive" data-value="university"><img src="/images/icons/profiles/icon-university.png"><br>University</li>
                <li class="text-center inactive" data-value="industry"><img src="/images/icons/profiles/icon-industry.png"><br>Industry</li>
                <li class="text-center inactive" data-value="goverment"><img src="/images/icons/profiles/icon-goverment.png"><br>Goverment</li>
                <li class="text-center inactive" data-value="society"><img src="/images/icons/profiles/icon-society.png"><br>Society</li>
                <li class="text-center inactive" data-value="mentors"><img src="/images/icons/profiles/icon-mentors.png"><br>Mentors</li>
            </ul>
        </div>
        <div class="panel panel-default col-md-6 col-md-offset-5">
            <div class="panel-body">
                <h3>Sign up</h3>
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
                    <input type="hidden" name="category" id="category" value="">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" id="newsletter" name="newsletter" checked value="1"> Sign me up for weekly
                            newsletter
                        </label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Create an Account
                        </button>
                    </div>
                    <h5 class="center-block text-center">
                        <small>By signing up you agree to our <a href="{{ action('PagesController@terms',[]) }}">Terms
                                of Use</a> and <a href="{{ action('PagesController@privacy',[]) }}">Privacy Policy</a>.
                        </small>
                        <hr/>
                        <small>Already have an account? <a href="{{ url('/auth/login') }}">Log in</a></small>
                    </h5>
                </form>
            </div>
        </div>
    </div>
@endsection
