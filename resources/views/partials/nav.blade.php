<div class="container" role="navigation">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav nav-pills nav-justified">
                    <li role="presentation" class="active dropdown"><a href="{{ action('PagesController@index') }}">@lang('general/menu.home')</a>
                    </li>
                    @if(Auth::check())
                        <li role="presentation"><a href="{{ action('UserController@profile') }}">@lang('general/menu.profile')</a></li>
                    @endif
                    <li role="presentation" class="dropdown"><a href="{{ action('ChallengesController@index') }}">@lang('general/menu.challenges')
                            <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a
                                href="{{ action('ProjectsController@index') }}">@lang('general/menu.projects') <span
                                    class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="#">@lang('general/menu.network') <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a
                                href="{{ action('PartnersController@index') }}">@lang('general/menu.partners') <span
                                    class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="{{ action('StoriesController@index') }}">@lang('general/menu.stories') <span
                                    class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="#">@lang('general/menu.news') <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="#">@lang('general/menu.blog') <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="{{ action('PagesController@index') }}">@lang('general/menu.contact') <span
                                    class="caret"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
