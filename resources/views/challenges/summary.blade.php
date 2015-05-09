<div class="content raised">
    <div class="image">
        <a href="{{ action('ChallengesController@show',[$challenge->id]) }}">
            <img class="img-responsive" src="{{ imagestyle($challenge->image,'fit330x297') }}"
                 alt="{{ $challenge->name }}"/>
        </a>
    </div>
    <div class="fields">
        <div class="title"><h4><a
                        href="{{ action('ChallengesController@show',[$challenge->id]) }}">{{ $challenge->name }}</a>
            </h4></div>
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
        <div class="more-link"><a href="{{ action('ChallengesController@show',[$challenge->id]) }}">Read more +</a>
        </div>
        <div class="links row">
            <div class="col-md-3 text-center">
                <div class="count">0</div>
                <div class="label">Likes</div>
                <a class="button btn btn-darkblue" href=""><i class="fa fa-thumbs-o-up"></i> Like</a>
            </div>
            <div class="col-md-4 text-center">
                <div class="count">0</div>
                <div class="label">Shares</div>
                <a class="button btn" href=""><i class="fa fa-share-alt"></i> Share</a>
            </div>
            <div class="col-md-5 text-center">
                <div class="count">0</div>
                <div class="label">Participants</div>
                <a class="button btn btn-purple {{ Auth::check() ?"" :"disabled" }}" href="">Participate</a>
            </div>
        </div>
    </div>


</div>
