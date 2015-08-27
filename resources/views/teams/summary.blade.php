<div class="content raised ">
    <div class="row">
        <div class="image col-md-4">
            <a href="{{ action('TeamsController@show',[$team->id]) }}">
                <img class="img-responsive"
                     src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                     alt="{{ $team->name }}"/>
            </a>
            @if($team->course->university)
                <div class="row">
                    <div class="col-md-12"><img class="img-responsive"
                                                src="/{{ imagestyle($team->course->university->image,'fit200x100') }}"
                                                alt="{{ $team->course->university->name }}"/></div>
                </div>
            @endif
        </div>
        <div class="fields col-md-8">
            <div class="title"><h4><a
                            href="{{ action('TeamsController@show',[$team->id]) }}">{{ $team->name }} # {{ $team->id }}</a>
                </h4></div>
            <div class="professor">
                <a href="/courses/{{ $team->course->id }}">{{ $team->course->name }}</a><br>
                <strong>@lang('general/labels.professor'): </strong>{{ $team->course->user->name }}</div>
            <div class=""><strong>@lang('general/labels.students'): </strong>{{ $team->users->count() }}</div>
            <div class="challenge"><a href="/challenges/{{ $team->challenge->id }}">{{ $team->challenge->name }}</a></div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <hr>
            <div class="links row">
                <div class="col-md-6" id="model-likes_{{ $team->id }}">
                    @include('likes.show',['model'=>$team,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$team->id])
                </div>
                <div class="col-md-6" id="model-follows_{{ $team->id }}">
                    @include('follows.show',['model'=>$team,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$team->id])
                </div>
            </div>

        </div>
    </div>
</div>

