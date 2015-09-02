@extends('app')

@section('title')
    @lang('general/labels.unavailable')
    @parent
@stop

@section('section-profile')
    @include('partials.profile')
@stop

@section('content')
    <div class="content">
        <br><br><br>
        <img src="/images/demo/no-disponible.png" alt="No disponible" class="img-responsive">
        <br><br><br>
    </div>
@stop