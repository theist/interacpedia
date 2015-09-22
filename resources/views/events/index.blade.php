@extends('app')
@section('title')
    {{ trans_choice('general/labels.events',2) }}
    @parent
@stop

@section('content')
    @if($open->count()>0)
        <h1>{{ trans_choice('general/labels.events',2) }} Abiertos</h1>
        <div class="row events">
            @foreach($open as $event)
                <div class="event summary col-md-4">
                    @include('events.summary')
                </div>
            @endforeach
        </div>
    @endif
    <h1>{{ trans_choice('general/labels.events',2) }} Finalizados</h1>
    <div class="row events">
        @foreach($finished as $event)
            <div class="event summary col-md-4">
                @include('events.summary')
            </div>
        @endforeach
    </div>
@stop