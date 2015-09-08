<div class="container-fluid" id="section-profile-blue">
    <div class="container">
        <div class="row profile challenge">
            <div class="col-md-6">
                <div class="col-md-4">
                    <div class="image">
                        @if($team->getMedia('teamphoto')->count() > 0)
                            <img class="img-responsive"
                                 src="{{ imagestyle($team->getMedia('teamphoto')->first()->getUrl(),'fit270x214') }}"
                                 alt="{{ $team->name }}"/>

                        @else
                            <img class="img-responsive"
                                 src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                                 alt="{{ $team->name }}"/>
                        @endif

                    </div>
                </div>
                <div class="col-md-8">
                    <div class="name">
                        @if($team->name != "Equipo" && $team->name != "")
                            {{ $team->name }}
                        @else
                            Equipo # {{ $team->id }}
                        @endif
                    </div>
                    <div class="data1"><h6>@lang('general/labels.course'):</h6> {{ $course->name }} </div>
                    <div class="data1"><h6>@lang('general/labels.university'):</h6> {{ $course->university->name }}</div>
                    <div class="data1"><h6>@lang('general/labels.hashtag'):</h6> #{{ $course->hashtag }}</div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="location text-right">
                    @if($course->user)
                        {{ ($course->user->city)?$course->user->city->name:"" }}{{ ($course->user->city && $course->user->country)?", ":"" }}
                        @if($course->user->country)
                            {{ $course->user->country->name }}
                            <img src="/images/icons/flags/{{ $course->user->country->code2 or "co" }}.png"
                                 alt=" {{ $course->user->country->name or "-" }}"/>
                        @endif
                    @endif
                    <div class="created">Creado: {{ $team->created_at }}</div>
                </div>

            </div>
            <div class="col-md-3 text-right">
                <div class="social">
                    <div id="model-follows">
                        @include('follows.show',['model'=>$team])
                    </div>
                    <div id="model-likes">
                        @include('likes.show',['model'=>$team])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
