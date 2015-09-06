@extends('app')

@section('title')
    @lang('general/labels.edit')
    @parent
@stop
@section('styles')
    <link href="/css/selectize.default.css" rel="stylesheet">
@stop

@section('content')
    <div class="user_edit">
        <div class="header">
            <div class="title">@lang('general/labels.edit') @lang('general/labels.my_profile')</div>
        </div>
        <div class="content">

            {!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]]) !!}
            <div class="row user-profile">
                @include('user.form',['submitButtonText' => Lang::get('general/labels.update')])
            </div>

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