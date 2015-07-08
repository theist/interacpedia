@extends('app')

@section('title')
    @lang('partners/title.partners')
    @parent
@stop

@section('content')
    <h1>@lang('partners/title.partners')</h1>
    <div class="row partners">
        <div class="col-md-12 text-center"><h3>@lang('general/labels.universities')</h3></div>
        @foreach($universities as $university)
            <div class="partner summary col-md-3">
                @include('partners.summary',['partner'=>$university])
            </div>
        @endforeach
    </div>
    <div class="row partners">
        <div class="col-md-12 text-center"><h3>@lang('general/labels.companies')</h3></div>
        @foreach($companies as $company)
            <div class="partner summary col-md-3">
                @include('partners.summary',['partner'=>$company])
            </div>
        @endforeach
    </div>
    <div class="row mentors">
        <div class="col-md-12 text-center"><h3>@lang('general/labels.mentors')</h3></div>
        @foreach($mentors as $mentor)
            <div class="mentor summary col-md-3">
                @include('mentors.summary',['mentor'=>$mentor])
            </div>
        @endforeach
    </div>
@stop