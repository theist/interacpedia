@extends('app')
@section('title')
    @lang('challenges/title.challenges')
    @parent
@stop

@section('content')
    <h1>@lang('challenges/title.challenges')</h1>
    @foreach($challenges as $challenge)
        @include('challenges.summary')
    @endforeach
@stop