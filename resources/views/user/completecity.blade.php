@extends('app')

@section('title')
    @lang('user/title.complete')
    @parent
@stop

@section('content')
    <div class="wizard">
        <div class="header">
            <img src="/images/wizard/icon.png" alt="Interacpedia"/>
            @lang('challenges/forms.step',['step'=>2,'total'=>4])
        </div>
        <div class="body row">
            <div class="col-md-10 col-md-offset-1 wizard_content text-center">
                <div class="row">
                    <div class="col-md-12"><h1 class="steps">Información básica</h1></div>
                    <div class="col-md-8 col-md-offset-2"><div class="subtitle">Elije una foto y completa algunos datos</div></div>
                </div>
                <div class="row">
                    {!! Form::model($user,['method' => 'PATCH', 'action' => ['UserController@update',$user->id]]) !!}
                    {!! Form::hidden('completecity',true) !!}
                    <div class="col-md-8 col-md-offset-2">
                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-circle" src="{{ $user->avatar }}" alt="{{ $user->name }}"/>
                            </div>
                            <div class="col-md-6">
                                {!! Form::label('country_id','País:') !!}
                                {!! Form::select('country_id',$countries,null,['id' => 'country_id','class' => 'form-control select2']) !!}
                                <p><small>Selecciona tu país actual.</small></p>

                                {!! Form::label('city_id','Ciudad:') !!}
                                {!! Form::select('city_id',$cities,null,['id' => 'city_id','class' => 'form-control select2']) !!}
                                <p><small>Selecciona tu ciudad actual.</small></p>

                                {!! Form::label('birthdate','Fecha de Nacimiento:') !!}
                                {!! Form::date('birthdate',null,['id' => 'birthdate','class' => 'form-control']) !!}
                                <p><small>Selecciona tu fecha de nacimiento.</small></p>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row">
                        <div class="col-md-2"><a class="btn btn-purple" href="{{ action('UserController@completecategory') }}">@lang('general/labels.previous')</a></div>
                        <div class="col-md-2 col-md-offset-8">{!! Form::submit(Lang::get('general/labels.next'),['id'=>'next_button','class' => 'btn']) !!}</div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@stop
@section('footer')
    <script>
        $('.select2').select2();
    </script>
@stop