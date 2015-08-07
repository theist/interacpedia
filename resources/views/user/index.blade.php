@extends('app')

@section('title')
    {{ trans_choice('general/labels.users', 3 ) }}
    @parent
@stop

@section('content')
    <h1>
        {{ trans_choice('general/labels.users', 3 ) }}
    </h1>
    <div class="row users">
        @foreach($users as $user)
            <div class="user summary col-md-4 {{ $user->agree?'agree':'not-agree' }}">
                @include('user.summary',['user'=>$user])
            </div>
        @endforeach
    </div>
@stop