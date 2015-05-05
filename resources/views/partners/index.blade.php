@extends('app')

@section('title')
    @lang('partners/title.partners')
    @parent
@stop

@section('content')
    <h1>@lang('partners/title.partners')</h1>
    @foreach($partners as $partner)
        @include('partners.summary')
    @endforeach
@stop