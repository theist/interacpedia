@extends('app')
@section('title')
    @lang('challenges/title.challenges')
    @parent
@stop

@section('content')
    <h1>@lang('general/labels.challenges')</h1>
    <div class="row challenges">
        @foreach($challenges as $challenge)
            <div class="challenge summary col-md-3">
                @include('challenges.summary')
            </div>
        @endforeach
    </div>
@stop