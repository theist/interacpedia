<div class="subtitle">
    <img src="/images/icons/40x40/process.png" alt="@lang('general/labels.teams')"/>
    @lang('general/labels.teams')
</div>
<div class="row teams">
    @foreach($user->teams as $team)
        <div class="team summary col-md-4">
            @include('teams.summary')
        </div>
    @endforeach
</div>


