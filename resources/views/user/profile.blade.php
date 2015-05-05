@extends('app')

@section('title')
    @lang('user/title.profile')
    @parent
@stop

@section('content')
    <h1>@lang('user/title.profile')</h1>
    <hr/>
    <pre>{{ print_r($user) }}</pre>
@stop