<div class="subtitle">
    <img src="/images/icons/40x40/process.png" alt="{{ trans_choice('general/labels.teams',2) }}"/>
    {{ trans_choice('general/labels.teams',2) }}
</div>
<div class="row teams">
    @foreach($user->teams as $team)
        <div class="team summary col-md-4">
            @include('teams.summary')
        </div>
    @endforeach
</div>


