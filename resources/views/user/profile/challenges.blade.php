<div class="subtitle">
    <img src="/images/icons/40x40/process.png" alt="@lang('general/labels.challenges_in_process')"/>
    @lang('general/labels.challenges_in_process')
</div>

<div class="row challenges">
    @foreach($user->challenges as $challenge)
        <div class="challenge summary col-md-3">
            @include('challenges.summary')
        </div>
    @endforeach
</div>
<div class="subtitle">
    <img src="/images/icons/40x40/ended.png" alt="@lang('general/labels.challenges_ended')"/>
    @lang('general/labels.challenges_ended')
</div>
<div class="row challenges">
    @foreach($user->challenges as $challenge)
        <div class="challenge summary col-md-3">
            @include('challenges.summary')
        </div>
    @endforeach
</div>
<a class="btn btn-blue2" href="/challenges">Ver más retos</a>
<a class="btn btn-purple  btn-capital form-control" href="/challenges/create">Crear un nuevo reto</a>
