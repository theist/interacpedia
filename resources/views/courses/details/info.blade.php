<div class="row course full">
    <div class="col-md-9 main">
        <div class="content">
            <h3>@lang('general/labels.students')</h3>

            <div class="row">
                @foreach($students as $st)
                    <div class="col-md-3 text-center student">
                        <a href="/user/{{ $st->id }}">
                            <img class="img-circle" height="80" src="{{ imagestyle($st->avatar,'fit100x100') }}"
                                 alt="{{ $st->name }}"/>
                        </a>

                        <div class="name">
                            <a href="/user/{{ $st->id }}">{{ $st->name }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <h3>@lang('general/labels.challenges')</h3>

            <div class="row challenges">
                @foreach($challenges as $challenge)
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
        @unless($course->mentors->isEmpty())
                <div class="content">
            <h4>@lang('general/labels.mentors')</h4>
            @foreach($course->mentors as $mentor)
                <div class="text-center row">
                    <div class="col-md-5">
                        <img class="img-circle" height="80" src="{{ imagestyle($mentor->image,'fit100x100') }}"
                             alt="{{ $mentor->name }}"/><br/>
                    </div>
                    <div class="col-md-7">
                        {{ $mentor->name }}<br>
                        @include('messages.add',['from'=>Auth::user()->id,'to'=>$mentor->user->id,'label'=> Lang::get('general/labels.contact')])
                    </div>
                </div>
            @endforeach
                    </div>
        @endunless
        @if($course->twitter_widget)
            <br>
            <a class="twitter-timeline" href="https://twitter.com/search?q=%40interacpedia%20%23{{ $course->hashtag }}"
               data-widget-id="{{ $course->twitter_widget }}">Tweets acerca de @interacpedia #{{ $course->hashtag }}</a>
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
        <div id="fb-root"></div>
        <script>(function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.4&appId=1579172622347450";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-page" data-href="https://www.facebook.com/interacpedia" data-small-header="false"
             data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true">
            <div class="fb-xfbml-parse-ignore">
                <blockquote cite="https://www.facebook.com/interacpedia"><a
                            href="https://www.facebook.com/interacpedia">Interacpedia</a></blockquote>
            </div>
        </div>
    </div>
</div>