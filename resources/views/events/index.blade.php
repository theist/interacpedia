@extends('app')
@section('title')
    {{ trans_choice('general/labels.events',2) }}
    @parent
@stop

@section('content')
    <h1>Todos los {{ trans_choice('general/labels.events',2) }}</h1>
    <div class="row events">
        @foreach($events as $event)
            <div class="event summary col-md-4">
                @include('events.summary')
            </div>
        @endforeach
    </div>
@stop