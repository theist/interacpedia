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
                    <li role="presentation" class="active dropdown"><a href="{{ action('PagesController@index') }}">Home</a>
                    </li>
                    @if(Auth::check())
                        <li role="presentation"><a href="{{ action('UserController@profile') }}">Profile</a></li>
                    @endif
                    <li role="presentation" class="dropdown"><a href="{{ action('ChallengesController@index') }}">Challenges
                            <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a
                                href="{{ action('ProjectsController@index') }}">Projects <span
                                    class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="#">Network <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a
                                href="{{ action('PartnersController@index') }}">Partners <span
                                    class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="{{ action('StoriesController@index') }}">Stories <span
                                    class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="#">News <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="#">Blog <span class="caret"></span></a></li>
                    <li role="presentation" class="dropdown"><a href="{{ action('PagesController@index') }}">Contact <span
                                    class="caret"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
