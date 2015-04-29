@extends('app')

@section('highlight')
    <div class="container">
        <div class="select-category text-center">
            <h2 class="text-center">Welcome back</h2>
        </div>
        <div class="panel panel-default col-md-6 col-md-offset-5">
            <div class="panel-body">
                <h3>Interacpedia</h3>
                @include('errors.alerts')
                You are now logged in!
            </div>
        </div>
    </div>
@endsection
