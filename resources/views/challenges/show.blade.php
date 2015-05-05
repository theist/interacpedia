@extends('app')

@section('title')
    @lang('challenges/title.show')
    @parent
@stop

@section('content')
    <h1>@lang('challenges/title.show')</h1>
    <hr/>
    <pre>{{ print_r($challenge) }}</pre>
@stop