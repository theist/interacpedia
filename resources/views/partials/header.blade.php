<div class="container">
    <div class="row">
        <div class="logo col-md-1 col-xs-12 text-center">
            <a href="{{ action('PagesController@index') }}"><img src="/images/logos/logo-interacpedia.png" alt="Interacpedia - Innovation 2.0"></a>
        </div>
        @if(Auth::check())
            <div class="usermenu col-md-2 col-md-offset-9 col-xs-12 text-center">
                <div class="row">
                    {{--<li role="presentation"><a href="#">English <span class="caret"></span></a></li>--}}
                    <a class="button col-xs-12" href="{{ url('auth/logout') }}">Logout</a>
                </div>
            </div>
        @else
            <div class="usermenu col-md-2 col-md-offset-9 col-xs-12 text-center">
                <div class="row">
                    {{--<li role="presentation"><a href="#">English <span class="caret"></span></a></li>--}}
                    <a class="button col-xs-6" href="{{ url('auth/register') }}">Sign Up</a>
                    <a class="button col-xs-6" href="{{ url('auth/login') }}">Login</a>
                </div>
            </div>
        @endif

    </div>
</div>