<div class="container" role="navigation">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">@lang('general/menu.toggle')</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="{{ action('PagesController@index') }}">@lang('general/menu.home')</a></li>
                    <li>
                        <a href="{{ action('PagesController@howitworks') }}" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            @lang('general/menu.interacpedia') <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('PagesController@about') }}">@lang('general/menu.whatis')</a></li>
                            <li><a href="{{ action('PagesController@howitworks') }}">@lang('general/menu.howitworks')</a></li>
                            <li><a href="{{ action('PagesController@index') }}">@lang('general/menu.contact')</a></li>
                        </ul>
                    </li>
                    @if(Auth::check())
                        <li><a href="/user/profile">@lang('general/menu.profile')</a></li>
                    @endif
                    <li><a href="{{ action('ChallengesController@index') }}">@lang('general/menu.challenges')</a></li>
                    <li><a href="{{ action('ProjectsController@index') }}">@lang('general/menu.projects')</a></li>
                    <li><a href="#">@lang('general/menu.network')</a></li>
{{--                    <li class="dropdown"><a href="#">@lang('general/menu.news') <span class="caret"></span></a></li>--}}
                    {{--<li class="dropdown"><a href="#">@lang('general/menu.blog') <span class="caret"></span></a></li>--}}
                    <li>
                        <a href="{{ action('PagesController@howitworks') }}" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" role="button" aria-expanded="false">
                            @lang('general/menu.more') <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ action('BlogController@index') }}">@lang('general/menu.blog')</a></li>
                            <li><a href="{{ action('PartnersController@index') }}">@lang('general/menu.partners')</a></li>
                        </ul>
                    </li>
                    @if(Auth::check())
                    <li class="icon">
                        <a href=""><img src="/images/icons/40x40/usermenu-notifications.png" alt="Notifications"/></a>
                    </li>
                    <li class="icon">
                        <a href="/user/{{ Auth::user()->id }}/messages"><img src="/images/icons/40x40/usermenu-messages.png" alt="Messages"/></a>
                    </li>
                    <li class="icon">
                        <a href="/user/{{ Auth::user()->id }}/notifications"><img src="/images/icons/40x40/usermenu-profile.png" alt="Messages"/></a>
                    </li>
                    <li class="icon">
                        <a href=""><img src="/images/icons/40x40/usermenu-down.png" alt="Messages"/></a>
                    </li>
                    @endif

                </ul>
            </div>
        </div>
    </nav>
</div>
