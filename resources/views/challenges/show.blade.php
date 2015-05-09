@extends('app')

@section('title')
    @lang('challenges/title.show')
    @parent
@stop

@section('content')
    <h1>{{ $challenge->name }}</h1>
    <hr/>
    {!! Form::open(array('route' => array('challenges.destroy', $challenge->id), 'method' => 'delete')) !!}
    <a class="btn" href="{{ action('ChallengesController@edit',[$challenge->id]) }}">@lang('challenges/forms.edit')</a>
    <input type="submit" class="btn btn-purple" value="@lang('challenges/forms.delete')">
    {!! Form::close() !!}

    <pre>{{ print_r($challenge) }}</pre>
@stop