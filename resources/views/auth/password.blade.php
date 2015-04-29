
@extends('app')

@section('highlight')
    <div class="container register-form">
        <div class="select-category text-center">
            <h2 class="text-center">Forgot your password?</h2>
        </div>
        <div class="panel panel-default col-md-6 col-md-offset-5">
            <div class="panel-body">
                <h3>Reset Password</h3>
                @if (session('status'))
                    <?php Toastr::success( session('status'), $title ='', $options = [ ] ) ?>
                @endif
                <form action="{{ url('/password/email') }}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="sr-only">E-Mail Address</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            Send Password Reset Link
                        </button>
                    </div>
                    <h5 class="center-block text-center">
                        <small>To try to login again, return <a href="{{ url('/auth/login') }}">here</a>.</small>
                        <hr/>
                        <small>Need to create an account? <a href="{{ url('/auth/register') }}">Sign Up</a></small>
                    </h5>
                </form>
            </div>
        </div>
    </div>
@endsection