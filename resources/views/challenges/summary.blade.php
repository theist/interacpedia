<div class="content raised">
    <div class="image">
        <a href="{{ action('ChallengesController@show',[$challenge->id]) }}">
            <img class="img-responsive" src="{{ imagestyle($challenge->image,'fit270x214') }}"
                 alt="{{ $challenge->name }}"/>
        </a>
    </div>
    <div class="fields">
        @if($challenge->partner)
            <div class="row">
                <div class="col-md-6 col-md-offset-3"><img class="img-responsive"
                                            src="{{ imagestyle($challenge->partner->logo,'fit200x100') }}"
                                            alt="{{ $challenge->partner->name }}"/></div>
            </div>
        @endif
        <div class="title"><h4><a
                        href="{{ action('ChallengesController@show',[$challenge->id]) }}">{{ $challenge->name }}</a>
            </h4></div>
        <div class="body">{{ str_limit( $challenge->description,100 )}}</div>
        <div class="more-link"><a href="{{ action('ChallengesController@show',[$challenge->id]) }}">@lang('general/labels.read_more') +</a></div>
        <div class="links row">
            <div class="col-md-6" id="model-likes_{{ $challenge->id }}">
                @include('likes.show',['model'=>$challenge,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$challenge->id])
            </div>
            <div class="col-md-6" id="model-follows_{{ $challenge->id }}">
                @include('follows.show',['model'=>$challenge,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$challenge->id])
            </div>
        </div>
    </div>


</div>
