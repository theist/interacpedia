@extends('app')

@section('title')
    @lang('projects/title.projects')
    @parent
@stop

@section('content')
    <h1>@lang('projects/title.recommended')</h1>
    <div class="row projects">
        @foreach($projects as $project)
            <div class="project col-md-3">
                @include('projects.summary')
            </div>
        @endforeach
    </div>
@stop