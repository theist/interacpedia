@extends('app')
@section('section-profile')
    @include('partials.profile')
@stop

@section('content')
    <div class="challenge_edit">
        <div class="header">
            <div class="title">@lang('challenges/title.edit')</div>
            <small>@lang('challenges/title.share')</small>
        </div>
        <div class="content">

            {!! Form::model($challenge,['method' => 'PATCH', 'action' => ['ChallengesController@update',$challenge->id]]) !!}
            @include('challenges.form',['submitButtonText' => Lang::get('challenges/title.edit')])
            {!! Form::close() !!}
            @include('errors.alerts')
        </div>
    </div>
@stop