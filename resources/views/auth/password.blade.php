@extends('app')

@section('title')
    Password
    @parent
@stop

@section('section-highlight')
    <div class="container register-form">
        <div class="select-category text-center">
            <h2 class="text-center">@lang('auth/forms.forgot')</h2>
        </div>
        <div class="panel panel-default col-md-6 col-md-offset-3">
            <div class="panel-body">
                <h3>@lang('auth/forms.reset')</h3>
                @if (session('status'))
                    <?php Toastr::success( session('status'), $title ='', $options = [ ] ) ?>
                @endif
                <form action="{{ url('/password/email') }}" method="post" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label class="sr-only">@lang('auth/forms.email')</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                               placeholder="Email">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">
                            @lang('auth/forms.sendpassword')
                        </button>
                    </div>
                    <h5 class="center-block text-center">
                        <small>@lang('auth/forms.loginagain',['url'=>'/auth/login'])</small>
                        <hr/>
{{--                        <small>@lang('auth/forms.needaccount') <a href="{{ url('/auth/register') }}">@lang('auth/forms.signup')</a></small>--}}
                    </h5>
                </form>
            </div>
        </div>
    </div>
@endsection