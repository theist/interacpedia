@extends('app')
@section('title')
    @lang('general/labels.courses')
    @parent
@stop

@section('content')
    <h1>@lang('general/labels.courses')</h1>
    <div class="row courses">
        @foreach($courses as $course)
            <div class="course summary col-md-3">
                @include('courses.summary')
            </div>
        @endforeach
    </div>
@stop