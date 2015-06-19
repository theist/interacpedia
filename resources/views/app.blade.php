<!DOCTYPE html>
<html lang="es">
<head>
    @section('meta')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:site_name" content="Interacpedia"/>
    @show
    <title>
        @section('title')
            :: interacpedia
        @show
    </title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="{{ elixir('css/styles.css') }}" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="/js/toastr.min.css" rel="stylesheet">
        <script type="text/javascript">
            !function(){var analytics=window.analytics=window.analytics||[];if(!analytics.initialize)if(analytics.invoked)window.console&&console.error&&console.error("Segment snippet included twice.");else{analytics.invoked=!0;analytics.methods=["trackSubmit","trackClick","trackLink","trackForm","pageview","identify","group","track","ready","alias","page","once","off","on"];analytics.factory=function(t){return function(){var e=Array.prototype.slice.call(arguments);e.unshift(t);analytics.push(e);return analytics}};for(var t=0;t<analytics.methods.length;t++){var e=analytics.methods[t];analytics[e]=analytics.factory(e)}analytics.load=function(t){var e=document.createElement("script");e.type="text/javascript";e.async=!0;e.src=("https:"===document.location.protocol?"https://":"http://")+"cdn.segment.com/analytics.js/v1/"+t+"/analytics.min.js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(e,n)};analytics.SNIPPET_VERSION="3.0.1";
                analytics.load("VA0kAC5QxtAPSeAJKkH8TBtNrGH5Fj9b");
                analytics.page('App')
            }}();
        </script>
</head>
<body>
<div class="container-fluid" id="header">
    @include('partials.header')
    @yield('header')</div>
<div class="container-fluid" id="section-nav">
    @include('partials.nav')
</div>
@yield('section-profile')
@yield('section-submenu')
<div class="container-fluid" id="section-banner">@yield('section-banner')</div>
<div class="container-fluid" id="section-featured">@yield('section-featured')</div>
<div class="container-fluid" id="section-highlight">@yield('section-highlight')</div>
<div class="container-fluid" id="section-content">
    <div class="container">
        @yield('content')
    </div>
</div>
<div class="container-fluid" id="section-partners">@yield('section-partners')</div>
<script src="/js/app.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@include('flash::messages')
{!! Toastr::render() !!}
<script>$('#flash-overlay-modal').modal();</script>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-558390bd5379e247" async="async"></script>

<div class="container-fluid" id="section-footer">
    @include('partials.footer')
    @yield('footer')
</div>
</body>
</html>
