<div class="content raised">
    <div class="image">
        <a href="{{ action('UserController@show',[$mentor->user->id]) }}">
            <img class="img-responsive" src="{{ imagestyle($mentor->image,'fit270x214') }}"
                 alt="{{ $mentor->name }}"/>
        </a>
    </div>
    <div class="fields">
        <div class="title"><h4><a href="{{ action('UserController@show',[$mentor->user->id]) }}">{{ $mentor->name }}</a></h4></div>
        <div class="subtitle">{{ $mentor->profile}}</div>
        <div class="location">{{ $mentor->location}}</div>
        <div class="body">
            <strong>@lang('general/labels.experience')</strong><br/>
            {{ $mentor->experience }}
        </div>
        <div class="body">
            <strong>@lang('general/labels.achievements')</strong><br/>
            {{ $mentor->achievements }}
        </div>
        <div class="row text-center">
            <div id="model-follows_m{{ $mentor->id }}" class="col-md-8 col-md-offset-2">
                @include('follows.show',['model'=>$mentor,'counter'=>false,'formid_suffix'=>'_m'.$mentor->id])
            </div>
        </div>
    </div>
</div>
