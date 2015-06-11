@extends('app')

@section('title')
    @lang('general/labels.create') @lang('general/labels.company')
    @parent
@stop

@section('section-profile')
    @include('partials.profile')
@stop

@section('content')
    <div class="company_create">
        <div class="header">
            <div class="title">@lang('general/labels.create') @lang('general/labels.company')</div>
        </div>
        <div class="content">
            {!! Form::model( $company = new \App\Interacpedia\Company, ['url' => 'companies'] ) !!}
            @include('companies.form',['submitButtonText' => Lang::get('general/labels.create')])
            {!! Form::close() !!}
            @include('errors.alerts')
        </div>
    </div>
@stop