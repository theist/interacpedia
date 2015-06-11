@extends('app')
@section('title')
    @lang('general/title.companies')
    @parent
@stop

@section('content')
    <h1>@lang('general/labels.companies')</h1>
    <div class="row companies">
        @foreach($companies as $company)
            <div class="company summary col-md-3">
                @include('companies.summary')
            </div>
        @endforeach
    </div>
@stop