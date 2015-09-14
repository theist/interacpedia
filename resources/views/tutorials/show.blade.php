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
    <div class="tutorial full row">
        <div class="col-md-6 main">
            <div class="content">
                <div class="image text-center ">
                    <img class="img-responsive" src="{{ $tutorial->image }}" alt="{{ $tutorial->title }}">
                </div>
                <div class="body">
                    {!!   $tutorial->description !!}
                </div>

            </div>
        </div>
        <div class="col-md-6 sidebar">
            <div class="content">
                <h4>Otros tutoriales</h4>
                <div class="row tutorials">
                    @foreach($tutorials as $tutorial)
                        <div class="tutorial summary col-md-6">
                            @include('tutorials.summary')
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@stop
