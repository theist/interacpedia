<div class="container-fluid" id="section-profile-blue">
    <div class="container">
        <div class="row profile challenge">
            <div class="col-md-6">
                <div class="col-md-4">
                    <div class="image">
                        <img class="img-responsive img-thumbnail"
                             src="{{ imagestyle('/images/courses/generic1.jpg','scale200x200') }}"
                             alt="{{ $course->name }}"/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="name">
                        {{ $course->name }}
                    </div>
                    <div class="data1"><h6>@lang('general/labels.university'):</h6>{{ '-' }}</div>
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
                    <div class="created">Creado: {{ $course->created_at }}</div>
                </div>

            </div>
            <div class="col-md-3 text-right">
                <div class="social">
                    <div id="model-follows">
                        @include('follows.show',['model'=>$course])
                    </div>
                    <div id="model-likes">
                        @include('likes.show',['model'=>$course])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
