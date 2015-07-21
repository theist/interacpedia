<div class="row challenge full">
    <div class="col-md-9 main">
        <div class="content">
            <h3>@lang('general/labels.students')</h3>
            <img class="img-responsive" src="/images/demo/students-list.jpg" alt="Students">

            <h3>@lang('general/labels.challenges')</h3>

            <div class="row challenges">
                @foreach($course->challenges as $challenge)
                    <div class="challenge summary col-md-4">
                        @include('challenges.summary')
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-md-3 sidebar">
        @if($course->user)
            <div class="content">
                <h4>@lang('general/labels.professor')</h4>
                @include('user.brief',['user'=>$course->user,'links'=>true,'label'=>''])
            </div>
        @endif
        @if($course->hashtag)
            <a class="twitter-timeline" href="https://twitter.com/search?q=%40interacpedia%20%23TEOCOM"
               data-widget-id="623347236169220096">Tweets acerca de @interacpedia #{{ $course->hashtag }}</a>
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
        @endif
        <div class="content">
            <img class="img-responsive" src="/images/demo/facebook-block.jpg" alt="Facebook">
        </div>
    </div>
</div>