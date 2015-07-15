@extends('app')

@section('title')
    @lang('general/labels.posts')
    @parent
@stop

@section('content')
    <h1>@lang('general/labels.posts')</h1>
    @foreach($posts as $post)
        <div class="col-md-4 preview">
            @include('blogs.post',['post'=>$post])
        </div>
    @endforeach
@stop