<div class="container-fluid" id="section-profile-blue">
    <div class="container">
        <div class="row profile challenge">
            <div class="col-md-6">
                <div class="col-md-4">
                    <div class="image">
                        @if($event->getMedia('eventphoto')->count() > 0)
                            <img class="img-responsive"
                                 src="{{ imagestyle($event->getMedia('eventphoto')->first()->getUrl(),'fit270x214') }}"
                                 alt="{{ $event->title}}"/>

                        @else
                            <img class="img-responsive"
                                 src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                                 alt="{{ $event->title }}"/>
                        @endif

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="name">{{ $event->title }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="location text-right">
                    {{ $event->location }}
                    <div class="created">Cuándo: {{ $event->start }}</div>
                </div>

            </div>
            <div class="col-md-3 text-right">
                <div class="social">
                    <div id="model-follows">
                        @include('follows.show',['model'=>$event])
                    </div>
                    <div id="model-likes">
                        @include('likes.show',['model'=>$event])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
