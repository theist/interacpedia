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
