<div class="row teams full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.teams', 2) }}</h4>
            <small>A continuación se muestran los equipos de trabajo de los estudiantes de esta clase.</small>
            <hr/>
            <div class="row">
                @foreach($teams as $team)
                    <div class="col-md-12 team">
                        <h4><a href="/teams/{{ $team->id }}">{{ trans_choice('general/labels.teams', 1) }}
                                # {{ $team->id }}</a>
                            <br>
                            <small>{{ $team->challenge->name }}</small>
                        </h4>
                        <div class="row content users">
                            <div class="col-md-10">
                                @foreach($team->users as $st)
                                    <div class="user summary col-md-6 {{ $st->agree?'agree':'not-agree' }}">
                                        @include('user.summary',['user'=>$st])
                                    </div>
                                @endforeach
                            </div>
                            <div class="col-md-2 team">
                                <a class="pull-right btn" href="/teams/{{ $team->id }}">Ver Equipo</a><br>
                                <strong>Brief:</strong>
                                @if($team->brief()->completed())
                                    <span class="label label-success">Completo</span>
                                @elseif($team->brief()->started())
                                    <span class="label label-warning">Comenzado</span>
                                @else
                                    <span class="label label-danger">Sin Comenzar</span>
                                @endif
                            </div>

                        </div>
                        <hr/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

