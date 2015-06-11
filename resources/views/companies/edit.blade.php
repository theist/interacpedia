@extends('app')

@section('title')
    @lang('general/labels.create') @lang('general/labels.company')
    @parent
@stop

@section('section-profile')
    @include('partials.profile')
@stop

@section('content')
    <div class="company_edit">
        <div class="header">
            <div class="title ">@lang('general/labels.edit') @lang('general/labels.company')</div>
        </div>
        <div class="content">
            {!! Form::model($company,['method' => 'PATCH', 'action' => ['CompanyController@update',$company->id]]) !!}
            @include('companies.form',['submitButtonText' => Lang::get('general/labels.update')])
            {!! Form::close() !!}
            @include('errors.alerts')
        </div>
    </div>
@stop