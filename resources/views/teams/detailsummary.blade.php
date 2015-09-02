<div class="col-md-12 team">
    <h4><a href="/teams/{{ $team->id }}">{{ trans_choice('general/labels.teams', 1) }}
            # {{ $team->id }}</a>
        <br>
        <small>{{ $team->challenge->name }}</small>
    </h4>
    <div class="row content users">
        <div class="col-md-10 border-right">
            @foreach($team->users as $st)
                <div class="user summary col-md-6 {{ $st->agree?'agree':'not-agree' }}">
                    @include('user.summary',['user'=>$st])
                </div>
            @endforeach
        </div>
        <div class="col-md-2 team">
            <h4>Detalles del equipo</h4>
            <a class="" href="/teams/{{ $team->id }}">Información</a><br>
            @if( Auth::check()
                && ( $team->users->contains( function ( $key, $value )
                    {
                        return $value->id == Auth::user()->id;
                    } )
                    || Auth::user()->id == $team->course->user->id
                    || Auth::user()->admin
                    || Auth::user()->mentors->count() > 0
                )
            )

                <a class="" href="/teams/{{ $team->id }}/brief">Completar Brief</a><br>
                <a class="" href="/teams/{{ $team->id }}/docs">Documentos</a><br>
                <a class="" href="/teams/{{ $team->id }}/comments">Comentarios</a><br>
            @endif
            <hr>
            <h4>Estado del Brief</h4>
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