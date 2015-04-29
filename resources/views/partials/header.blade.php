<div class="container">
    <div class="row">
        <div class="logo col-md-8">
            <a href="{{ action('PagesController@index') }}"><img src="/images/logos/logo-interacpedia.png" alt="Interacpedia - Innovation 2.0"></a>
        </div>

        @if(Auth::check())
            <div class="usermenu col-md-4 col-md-offset-4 text-right">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation"><a href="#">English <span class="caret"></span></a></li>
                    <li role="presentation"><a href="{{ url('auth/logout') }}">Logout</a></li>
                </ul>
            </div>
        @else
            <div class="usermenu col-md-5 col-md-offset-3 text-right">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation"><a href="#">English <span class="caret"></span></a></li>
                    <li role="presentation"><a href="{{ url('auth/register') }}">Sign Up</a></li>
                    <li role="presentation"><a href="{{ url('auth/login') }}">Login</a></li>
                </ul>
            </div>
        @endif

    </div>
</div>