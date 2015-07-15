<div class="content raised">
    <div class="image">
        <a href="{{ action('CoursesController@show',[$course->id]) }}">
            <img class="img-responsive" src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                 alt="{{ $course->name }}"/>
        </a>
    </div>
    <div class="fields">
        <div class="title"><h4><a
                        href="{{ action('CoursesController@show',[$course->id]) }}">{{ $course->name }}</a>
            </h4></div>
        <br>
        <br>
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
