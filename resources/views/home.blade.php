@extends('app')

@section('title')
    @lang('general/title.home')
    @parent
@stop

@section('banner')
    {{--@unless(Auth::check() || Request::path() != '/')--}}
    <div class="container">
        <div class="banner-main text-center">
            <h1>The Future of Innovation <br/>
                <small>“The new innovative methodology and interactive crowd sourced platform”</small>
            </h1>
            <a href="{{ action('ChallengesController@index') }}" class="btn btn-purple">Search Challenge</a>
            <a href="{{ action('ChallengesController@create') }}" class="btn btn-green">Create Challenge</a>
            <button class="btn btn-blue">Discover Project</button>
        </div>
    </div>
    {{--@endunless--}}
@stop

@section('content')
    <div class="row stories">
        <div class="col-md-10 col-md-offset-1">
            <h3>@lang('stories/title.stories')</h3>
            @foreach($stories as $story)
                @include('stories.summary')
            @endforeach
        </div>
    </div>
@stop

@section('section-partners')
    <div class="container">
        <div class="row partners text-center">
            <h3>@lang('partners/title.partners')</h3>
            @foreach($partners as $partner)
                <div class="col-md-3 text-center">
                    @include('partners.summary')
                </div>
            @endforeach
        </div>
    </div>
@stop