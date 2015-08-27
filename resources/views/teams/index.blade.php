@extends('app')
@section('title')
    {{ trans_choice('general/labels.teams',2) }}
    @parent
@stop

@section('content')
    <h1>{{ trans_choice('general/labels.teams',2) }}</h1>
    <div class="row teams">
        @foreach($teams as $team)
            <div class="team summary col-md-4">
                @include('teams.summary')
            </div>
        @endforeach
    </div>

@stop