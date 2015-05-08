@extends('app')
@section('section-profile')
    @include('partials.profile')
@stop

@section('content')
    <div class="challenge_create">
        <div class="header">
            <div class="title">@lang('challenges/title.start')</div>
            <small>@lang('challenges/title.share')</small>
        </div>
        <div class="content">
            {!! Form::model( $challenge = new \App\Interacpedia\Challenge, ['url' => 'challenges'] ) !!}
            @include('challenges.form',['submitButtonText' => Lang::get('challenges/title.create')])
            {!! Form::close() !!}
            @include('errors.alerts')
        </div>
    </div>
@stop