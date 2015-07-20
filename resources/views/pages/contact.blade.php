@extends('app')

@section('title')
    @lang('general/labels.contact')
    @parent
@stop

@section('content')
    <h1>@lang('general/labels.contact')</h1>
    <hr/>
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    {!! Form::open(array('route' => 'contact_store', 'class' => 'form')) !!}
    <div class="form-group">
        {!! Form::label('Nombre') !!}
        {!! Form::text('name', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Tu nombre')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Correo electrónico') !!}
        {!! Form::text('email', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Tu dirección de correo electrónico')) !!}
    </div>
    <div class="form-group">
        {!! Form::label('Mensaje') !!}
        {!! Form::textarea('message', null,
            array('required',
                  'class'=>'form-control',
                  'placeholder'=>'Tu mensaje')) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Contáctanos!',
          array('class'=>'btn btn-primary')) !!}
    </div>
    {!! Form::close() !!}
@stop