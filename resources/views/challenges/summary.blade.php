<div class="content">
    <div class="image"><img class="img-responsive" src="{{ imagestyle($challenge->image,'fit330x297') }}" alt="{{ $challenge->name }}"/></div>
    <div class="fields">
        <div class="title"><h3><a href="{{ action('ChallengesController@show',[$challenge->id]) }}">{{ $challenge->name }}</a></h3></div>
        <div class="body">{{ $challenge->description}}</div>
        @unless($challenge->rewards->isEmpty())
            <div class="rewards">
                <h5>Rewards:</h5>
                <ul>
                    @foreach($challenge->rewards as $reward)
                        <li>{{ $reward->name }}</li>
                    @endforeach
                </ul>
            </div>
        @endunless
        <div class="more-link"><a href="{{ action('ChallengesController@show',[$challenge->id]) }}">Read more</a></div>
        <div class="links">
            <a class="button btn btn-purple" href="">Like</a>
            <a class="button btn btn-purple" href="">Share</a>
            <a class="button btn btn-purple" href="">Participate</a>
        </div>
    </div>


</div>
