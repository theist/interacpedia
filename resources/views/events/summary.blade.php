<div class="content raised ">
    <div class="row">
        <div class="image col-md-4">
            <a href="{{ action('EventsController@show',[$event->id]) }}">
                @if($event->getMedia('eventphoto')->count() > 0)
                    <img class="img-responsive"
                         src="{{ imagestyle($event->getMedia('eventphoto')->first()->getUrl(),'fit270x214') }}"
                         alt="{{ $event->title}}"/>
                @else
                    <img class="img-responsive"
                         src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                         alt="{{ $event->title}}"/>
                @endif
            </a>
        </div>
        <div class="fields col-md-8">
            <div class="title"><h4><a
                            href="{{ action('EventsController@show',[$event->id]) }}">
                        {{ $event->title}}
                    </a>
                </h4></div>
        </div>
        <div class="fields col-md-12">
            <div class="fields">
                {{ $event->description }}
                <div class=""><strong>@lang('general/labels.location'): </strong>{{ $event->location }}</div>
                <div class=""><strong>@lang('general/labels.when'): </strong>{{ $event->start }}</div>
            </div>
            <div class="col-md-10 col-md-offset-1">
                <hr>
                <div class="links row">
                    <div class="col-md-6" id="model-likes_{{ $event->id }}">
                        @include('likes.show',['model'=>$event,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$event->id])
                    </div>
                    <div class="col-md-6" id="model-follows_{{ $event->id }}">
                        @include('follows.show',['model'=>$event,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$event->id])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>