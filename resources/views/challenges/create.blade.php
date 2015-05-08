@extends('app')
@section('content')
    <h1>@lang('challenges/title.create')</h1>

    <hr/>

    {!! Form::model( $challenge = new \App\Interacpedia\Challenge, ['url' => 'challenges'] ) !!}

    @include('challenges.form',['submitButtonText' => 'Add Challenge'])

    {!! Form::close() !!}

    @include('errors.alerts')

@stop