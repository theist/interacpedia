@extends('app')

@section('highlight')
    <div class="container register-form">
        <br/>
        <div class="panel panel-default col-md-12 col-md-offset-2">
            <div class="panel-body">
                <h3>Sign up</h3>
                <hr/>
                <form action="{{ url('/auth/register') }}" method="post" role="form">
                    <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary btn-block facebook">
                        Sign Up with Facebook
                    </button>
                    </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary btn-block linkedin">
                        Sign Up with LinkedIn
                    </button>
                </div>
                <div class="form-group col-md-6">
                    <button type="submit" class="btn btn-primary btn-block google">
                        Sign Up with Google
                    </button>
                </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
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
