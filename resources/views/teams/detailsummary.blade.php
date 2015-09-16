<div class="col-md-12 team">
    <h4><a href="/teams/{{ $team->id }}">
            @if($team->name != "Equipo" && $team->name != "")
                {{ $team->name }}
            @else
                Equipo # {{ $team->id }}
            @endif
        </a>
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
            @if($team->brief()->completed())
                <div class="badgein">
                    <img src="/images/badges/brief_100.png" alt="Tu equipo ha completado el Brief!"
                         class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                         title="Tu equipo ha completado el Brief!">
                </div>
            @endif
            @if($team->team_on())
                <div class="badgein">
                    <img src="/images/badges/team_on.png"
                         alt="Todos los miembros del equipo se han activado en Interacpedia!"
                         class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                         title="Todos los miembros del equipo se han activado en Interacpedia!">
                </div>
            @endif
            @if($team->perfil_ok())
                <div class="badgein">
                    <img src="/images/badges/perfil_ok.png" alt="Todos los miembros del equipo completaron su perfil!"
                         class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                         title="Todos los miembros del equipo completaron su perfil!">
                </div>
            @endif
            @if($team->challenge_comments())
                <div class="badgein">
                    <img src="/images/badges/team_comments.png" alt="Algún miembro del equipo ha comentado en el reto!"
                         class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                         title="Algún miembro del equipo ha comentado en el reto!">
                </div>
            @endif

        </div>
    </div>
    <hr/>
</div>

@section('footer')
    @parent
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop