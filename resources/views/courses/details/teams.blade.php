<div class="row teams full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.teams', 2) }}</h4>
            <small>A continuación se muestran los equipos de trabajo de los estudiantes de esta clase.</small>
            <hr/>
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-12 team">
                        <h4>{{ trans_choice('general/labels.teams', 1) }} # {{ $team->id }}<br>
                            <small>{{ $team->challenge->name }}</small>
                        </h4>
                        <div class="row content users">
                            @foreach($team->users as $st)
                                <div class="user summary col-md-4 {{ $st->agree?'agree':'not-agree' }}">
                                    @include('user.summary',['user'=>$st])
                                </div>
                            @endforeach
                        </div>
                        <hr/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

