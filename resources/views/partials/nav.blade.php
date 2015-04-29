<div class="container">
    <ul class="nav nav-pills nav-justified">
        <li role="presentation" class="active dropdown"><a href="{{ action('PagesController@index') }}">Home</a></li>
        @if(Auth::check())
            <li role="presentation"><a href="{{ action('UserController@profile') }}">Profile</a></li>
        @endif
        <li role="presentation" class="dropdown"><a href="{{ action('ChallengesController@index') }}">Challenges <span
                        class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="#">Projects <span class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="#">Network <span class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="#">Partners <span class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="#">Stories <span class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="#">News <span class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="#">Blog <span class="caret"></span></a></li>
        <li role="presentation" class="dropdown"><a href="{{ action('PagesController@index') }}">Contact <span class="caret"></span></a></li>
    </ul>
</div>
