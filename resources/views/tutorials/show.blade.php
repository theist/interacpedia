@extends('app')

@section('title')
    {{ $tutorial->title }}
    @parent
@stop
@section('section-profile')
    @include('partials.profile')
@stop

@section('content')
    <br>
    <div class="text-center">
        <img class="img-responsive" src="{{ $tutorial->image }}" alt="{{ $tutorial->title }}">
    </div>

@stop
