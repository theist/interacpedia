<div class="content raised ">
    <div class="row">
        <div class="image col-md-4">
            <a href="{{ action('TeamsController@show',[$team->id]) }}">
                @if($team->getMedia('teamphoto')->count() > 0)
                    <img class="img-responsive"
                         src="{{ imagestyle($team->getMedia('teamphoto')->first()->getUrl(),'fit270x214') }}"
                         alt="{{ $team->name }}"/>

                @else
                    <img class="img-responsive"
                         src="{{ imagestyle('/images/courses/generic' . rand(1,2) . '.jpg','fit270x214') }}"
                         alt="{{ $team->name }}"/>
                @endif
            </a>
            @if($team->course->university)
                <div class="row">
                    <div class="col-md-12"><img class="img-responsive"
                                                src="/{{ imagestyle($team->course->university->image,'fit200x100') }}"
                                                alt="{{ $team->course->university->name }}"/></div>
                </div>
            @endif
        </div>
        <div class="fields col-md-8 col-md-offset-0 col-xs-10 col-xs-offset-1">
            <div class="title"><h4><a
                            href="{{ action('TeamsController@show',[$team->id]) }}">
                        @if($team->name != "Equipo" && $team->name != "")
                            {{ $team->name }}
                        @else
                            Equipo # {{ $team->id }}
                        @endif
                    </a>
                </h4></div>
            <div class="professor">
                <a href="/courses/{{ $team->course->id }}">{{ $team->course->name }}</a><br>
                <strong>@lang('general/labels.professor'): </strong>{{ $team->course->user->name }}</div>
            <div class=""><strong>@lang('general/labels.students'): </strong>{{ $team->users->count() }}</div>
            <div class="challenge"><a href="/challenges/{{ $team->challenge->id }}">{{ $team->challenge->name }}</a>
            </div>
        </div>
        <div class="col-md-10 col-md-offset-1 badges">
            <div class="row">
                @if($team->brief()->completed())
                    <div class="col-md-4">
                        <img src="/images/badges/brief_100.png" alt="Tu equipo ha completado el Brief!"
                             class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                             title="Tu equipo ha completado el Brief!">
                    </div>
                @endif
                @if($team->team_on())
                    <div class="col-md-4">
                        <img src="/images/badges/team_on.png"
                             alt="Todos los miembros del equipo se han activado en Interacpedia!"
                             class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                             title="Todos los miembros del equipo se han activado en Interacpedia!">
                    </div>
                @endif
                @if($team->perfil_ok())
                    <div class="col-md-4">
                        <img src="/images/badges/perfil_ok.png"
                             alt="Todos los miembros del equipo completaron su perfil!"
                             class="img-responsive" data-toggle="tooltip" data-placement="bottom"
                             title="Todos los miembros del equipo completaron su perfil!">
                    </div>
                @endif

            </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
            <hr>
            <div class="links row">
                <div class="col-md-6" id="model-likes_{{ $team->id }}">
                    @include('likes.show',['model'=>$team,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$team->id])
                </div>
                <div class="col-md-6" id="model-follows_{{ $team->id }}">
                    @include('follows.show',['model'=>$team,'counter'=>true,'format'=>'vertical','formid_suffix'=>'_'.$team->id])
                </div>
            </div>

        </div>
    </div>
</div>

@section('footer')
    @parent
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@stop