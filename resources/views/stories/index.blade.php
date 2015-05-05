@extends('app')

@section('title')
    @lang('stories/title.stories')
    @parent
@stop

@section('content')
    <h1>@lang('stories/title.stories')</h1>
    @foreach($stories as $story)
        @include('stories.summary')
    @endforeach
@stop