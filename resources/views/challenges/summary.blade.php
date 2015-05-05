<div>
    <img class="img-responsive" src="{{ imagestyle($challenge->image,'fit330x297') }}" alt="{{ $challenge->name }}"/>
    <h2><a href="{{ action('ChallengesController@show',[$challenge->id]) }}">{{ $challenge->name }}</a></h2>
    <div class="body">{{ $challenge->description}}</div>
    @unless($challenge->rewards->isEmpty())
        <h5>Rewards:</h5>
        <ul>
            @foreach($challenge->rewards as $reward)
                <li>{{ $reward->name }}</li>
            @endforeach
        </ul>
    @endunless
</div>
