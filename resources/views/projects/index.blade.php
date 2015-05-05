@extends('app')

@section('title')
    @lang('projects/title.projects')
    @parent
@stop

@section('content')
    <h1>@lang('projects/title.projects')</h1>
    @foreach($projects as $project)
        @include('projects.summary')
    @endforeach
@stop