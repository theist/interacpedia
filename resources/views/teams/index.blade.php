@extends('app')
@section('title')
    {{ trans_choice('general/labels.teams',2) }}
    @parent
@stop

@section('content')
    <h1>Mis {{ trans_choice('general/labels.teams',2) }}</h1>
    <div class="row teams main">
        <div class="content col-md-12">
            <div class="row">
                @foreach($myteams as $team)
                    @include('teams.detailsummary',['team'=>$team])
                @endforeach
            </div>
        </div>
    </div>

    <h1>Todos los {{ trans_choice('general/labels.teams',2) }}</h1>
    <div class="row teams">
        @foreach($teams as $team)
            <div class="team summary col-md-4">
                @include('teams.summary')
            </div>
        @endforeach
    </div>

@stop