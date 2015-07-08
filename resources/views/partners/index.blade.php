@extends('app')

@section('title')
    @lang('partners/title.partners')
    @parent
@stop

@section('content')
    <h1>@lang('partners/title.partners')</h1>
    <div class="row partners">
        <div class="col-md-12">@lang('general/labels.companies')</div>
        @foreach($companies as $company)
            <div class="partner summary col-md-3">
                @include('partners.summary',['partner'=>$company])
            </div>
        @endforeach
    </div>
    <div class="row partners">
        <div class="col-md-12">@lang('general/labels.universities')</div>
        @foreach($universities as $university)
            <div class="partner summary col-md-3">
                @include('partners.summary',['partner'=>$university])
            </div>
        @endforeach
    </div>
@stop