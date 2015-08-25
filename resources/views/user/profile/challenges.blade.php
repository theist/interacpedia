<div class="subtitle">
    <img src="/images/icons/40x40/process.png" alt="@lang('general/labels.challenges_in_process')"/>
    @lang('general/labels.challenges_in_process')
</div>

<div class="row challenges">
    @foreach($user->teams as $team)
        <div class="challenge summary col-md-3">
            @include('challenges.summary',['challenge'=>$team->challenge])
        </div>
    @endforeach
</div>
<div class="row challenges">
    @foreach($user->challenges as $challenge)
        <div class="challenge summary col-md-3">
            @include('challenges.summary')
        </div>
    @endforeach
</div>
<a class="btn btn-blue2" href="/challenges">Ver más retos</a>

