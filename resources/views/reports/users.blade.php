@extends('app')

@section('title')
    {{ trans_choice('general/labels.users', 2 ) }}
    @parent
@stop

@section('content')
    <h1>
        {{ trans_choice('general/labels.users', 2 ) }}
    </h1>
    <div class="form row">
        {!! Form::open(array('url' => 'reports/users')) !!}
        <div class="col-md-3 form-group">
            {!! Form::label('type', 'Tipo de Usuario') !!}
            {!! Form::select('type',$types, $type,['id' => 'types','class' =>'form-control']) !!}
        </div>
        <div class="col-md-3 form-group">
            {!! Form::label('sort', 'Ordenar por') !!}
            {!! Form::select('sort',$sorts, $sort,['id' => 'sort','class' =>'form-control']) !!}
        </div>
        <div class="col-md-2 form-group">
                {!! Form::submit('Actualizar',['class' => 'btn btn-purple btn-big']) !!}
        </div>
        {!! Form::close() !!}
        <div class="col-md-2 form-group">
            <a href="/reports/users/export" class="btn">Exportar Excel</a>
        </div>
    </div>
    <hr>
    <div class="row users">
        @foreach($users as $user)
            <div class="user summary details col-md-4 {{ $user->agree?'agree':'not-agree' }}">
                @include('user.detailsummary',['user'=>$user])
            </div>
        @endforeach
    </div>
@stop