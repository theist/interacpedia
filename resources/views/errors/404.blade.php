@extends('app')

@section('title')
    @lang('general/labels.unavailable')
    @parent
@stop

@section('section-profile')
    @if(Auth::check())
        @include('partials.profile')
    @endif
@stop

@section('content')
    <div class="content">
        <br><br><br>
        <h4>Has accedido a una página que ya no existe.</h4>
        <br><br><br>
    </div>
@stop