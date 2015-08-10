@extends('app')
@section('title')
    {{ trans_choice('general/labels.tutorials', 2 ) }}
    @parent
@stop

@section('content')
    <h1>{{ trans_choice('general/labels.tutorials', 2 ) }}</h1>
    <div class="row tutorials">
        @foreach($tutorials as $tutorial)
            <div class="tutorial summary col-md-3">
                @include('tutorials.summary')
            </div>
        @endforeach
    </div>
@stop