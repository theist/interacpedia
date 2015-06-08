<div class="container">
    <div class="row">
        <div class="logo col-md-1 col-xs-12 text-center">
            <a href="{{ action('PagesController@index') }}">
                <img src="/images/logos/logo-interacpedia.png" alt="Interacpedia - Innovation 2.0">
                <span class="label label-danger">BETA</span>
            </a>
        </div>
        @if(Auth::check())
            <div class="usermenu col-md-5 col-md-offset-6 col-xs-12 text-right">
                <div class="row text-right">
                    {{--<li role="presentation"><a href="#">English <span class="caret"></span></a></li>--}}
                    <div class="col-md-2"></div>
                    <a class="btn btn-purple col-xs-12 col-md-2" href="{{ action('ChallengesController@create') }}">+ @lang('general/labels.challenge')</a>
                    <a class="btn btn-green col-xs-12 col-md-3" href="">+ @lang('general/labels.project')</a>
                    <a class="btn btn-white col-xs-12 col-md-3" href="{{ url('auth/logout') }}">@lang('auth/title.logout')</a>
                </div>
            </div>
        @else
            <div class="usermenu col-md-2 col-md-offset-9 col-xs-12 text-center">
                <div class="row">
                    {{--<li role="presentation"><a href="#">English <span class="caret"></span></a></li>--}}
                    <a class="button col-xs-6" href="{{ url('auth/register') }}">@lang('auth/title.signup')</a>
                    <a class="button col-xs-6" href="{{ url('auth/login') }}">@lang('auth/title.login')</a>
                </div>
            </div>
        @endif

    </div>
</div>