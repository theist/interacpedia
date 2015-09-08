<div class="row teams full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.teams', 2) }}</h4>
            <small>A continuación se muestran los equipos de trabajo de los estudiantes de esta clase.</small>
            <hr/>
            <div class="row">
                @foreach($teams as $team)
                    <div class="team summary col-md-4">
                        @include('teams.summary',['team'=>$team])
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

