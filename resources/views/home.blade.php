@extends('app')

@section('title')
    @lang('general/title.home')
    @parent
@stop

@section('section-banner')
    {{--@unless(Auth::check() || Request::path() != '/')--}}
    <div class="container">
        <div class="banner-main text-center">
            <h1>@lang('general/banner.future') <br/>
                <small>@lang('general/banner.slogan')</small>
            </h1>
            <a href="{{ action('ChallengesController@index') }}"
               class="btn btn-purple">@lang('general/banner.search_challenge')</a>
            <a href="{{ action('ChallengesController@create') }}"
               class="btn btn-green">@lang('general/banner.create_challenge')</a>
            <button class="btn btn-blue">@lang('general/banner.discover_projects')</button>
        </div>
    </div>
    {{--@endunless--}}
@stop

@section('section-highlight')
    <div class="container">
        <div class="row stories">
            <div class="col-md-10 col-md-offset-1">
                <h3>@lang('stories/title.stories')</h3>
                @foreach($stories as $story)
                    @include('stories.summary')
                @endforeach
            </div>
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
{{--@section('footer')--}}
    {{--<script>--}}
        {{--$('.dropdown-toggle').on('mouseover', function (){--}}
            {{--$(this).dropdown('toggle');--}}
        {{--});--}}
        {{--$('.dropdown-toggle').on('mouseout', function (){--}}
            {{--setTimeout('$(this).dropdown(\'toggle\')',1000);--}}
        {{--});--}}
    {{--</script>--}}
{{--@stop--}}