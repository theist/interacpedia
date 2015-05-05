@extends('app')
@section('title')
    @lang('challenges/title.challenges')
    @parent
@stop

@section('content')
    <h1>@lang('challenges/title.recommended')</h1>
    <div class="row challenges">
        @foreach($challenges as $challenge)
            <div class="challenge col-md-3">
                @include('challenges.summary')
            </div>
        @endforeach
    </div>
@stop