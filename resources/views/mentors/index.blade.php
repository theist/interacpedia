@extends('app')

@section('title')
    @lang('general/labels.mentors')
    @parent
@stop

@section('content')
    <h1>@lang('general/labels.mentors')</h1>
    <div class="row mentors">
        @foreach($mentors as $mentor)
            <div class="mentor summary col-md-3">
                @include('mentors.summary',['mentor'=>$mentor])
            </div>
        @endforeach
    </div>
@stop