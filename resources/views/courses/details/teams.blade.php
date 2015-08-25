<div class="row teams full">
    <div class="main">
        <div class="content col-md-12">
            <h4>{{ trans_choice('general/labels.teams', 2) }}</h4>
            <small>A continuación se muestran los equipos de trabajo de los estudiantes de esta clase.</small>
            <hr/>
            <div class="row">
            @foreach($teams as $team)
                <div class="col-md-6 team">
                    <h4>{{ trans_choice('general/labels.teams', 1) }} # {{ $team->id }}<br>
                        <small>{{ $team->challenge->name }}</small></h4>
                    <div class="row content">
                    @foreach($team->users as $st)
                        <div class="col-md-6 text-center student">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="/user/{{ $st->id }}">
                                        <img class="img-circle" height="50" src="{{ imagestyle($st->avatar,'fit100x100') }}"
                                             alt="{{ $st->name }}"/>
                                    </a>
                                </div>
                                <div class="name text-left col-md-9">
                                    <a href="/user/{{ $st->id }}">{{ $st->name }}</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
{{--                    @include('teams.summary',['post'=>$post,'model'=>$course])--}}
                    <hr/>
                </div>

            @endforeach
            </div>
        </div>
    </div>
</div>

