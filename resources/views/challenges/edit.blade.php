@extends('app')

@section('title')
    @lang('challenges/title.edit')
    @parent
@stop
@section('styles')
    <link href="/css/selectize.default.css" rel="stylesheet">
@stop

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

            {!! Form::model($challenge,['files'=>true,'method' => 'PATCH', 'action' => ['ChallengesController@update',$challenge->id]]) !!}
            @include('challenges.form',['submitButtonText' => Lang::get('challenges/title.edit')])
            {!! Form::close() !!}
            @include('errors.alerts')
        </div>
    </div>
@stop

@section('scripts')
    <script src="/js/selectize.js"></script>
    <script>
        $(function() {
            $(".selectize").selectize({
                plugins: ['remove_button'],
                create: true
            });
        });
    </script>
@stop