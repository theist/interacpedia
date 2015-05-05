@extends('app')

@section('title')
    @lang('user/title.complete')
    @parent
@stop

@section('content')
    <h1>@lang('user/title.complete')</h1>
    <hr/>
    <p class="lead">@lang('user/messages.complete_city')</p>
    {!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]]) !!}
    <div>
        <div class="panel panel-default col-md-4">
            <div class="panel-body">
                {!! Form::label('city','City:') !!}
                {!! Form::select('city',$cities,null,['id' => 'city','class' => 'form-control']) !!}
                <p><small>Select your current city.</small></p>
            </div>
        </div>
        <div class="col-md-1"></div>
        <div class="panel panel-default col-md-4">
            <div class="panel-body">
                {!! Form::label('city','Birth Date:') !!}
                {!! Form::date('birthdate',null,['id' => 'birthdate','class' => 'form-control']) !!}
                <p><small>Select your date of birth.</small></p>
            </div>
        </div>
    </div>
    <div class="form-group">
        {!! Form::submit('Update your profile',['class' => 'btn btn-primary form-control']) !!}
    </div>
    {!! Form::close() !!}

@stop