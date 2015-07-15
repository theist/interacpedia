@extends('app')

@section('title')
    {{ $project->name }}
    @parent
@stop

@section('content')
    <img src="/images/demo/joinder.jpg" alt="Joinder" class="img-responsive">
@stop
