<div class="content raised ">
    <div class="row">
        <div class="image col-md-4">
            <a href="{{ action('CoursesController@show',[$course->id]) }}">
                <img class="img-responsive"
                     src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                     alt="{{ $course->name }}"/>
            </a>
            @if($course->university)
                <div class="row">
                    <div class="col-md-12"><img class="img-responsive"
                                                src="/{{ imagestyle($course->university->image,'fit200x100') }}"
                                                alt="{{ $course->university->name }}"/></div>
                </div>
            @endif
        </div>
        <div class="fields col-md-8">
            <div class="title"><h4><a
                            href="{{ action('CoursesController@show',[$course->id]) }}">{{ $course->name }}</a>
                </h4></div>
            <div class="professor">{{ $course->user->name }}</div>
            <div class=""><strong>@lang('general/labels.students'): </strong>{{ $course->students->count() }}</div>
            <div class=""><strong>@lang('general/labels.challenges'): </strong>{{ $course->challenges->count() }}</div>
            <div class=""><strong>@lang('general/labels.mentors'): </strong>{{ $course->mentors->count() }}</div>
            <br>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <hr>
            <div class="links row">
                <div class="col-md-6" id="model-likes_{{ $course->id }}">
                    @include('likes.show',['model'=>$course,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$course->id])
                </div>
                <div class="col-md-6" id="model-follows_{{ $course->id }}">
                    @include('follows.show',['model'=>$course,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$course->id])
                </div>
            </div>

        </div>
    </div>
</div>

