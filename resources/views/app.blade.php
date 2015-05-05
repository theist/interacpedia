<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @section('title')
            :: interacpedia
        @show
    </title>
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link href="{{ elixir('css/styles.css') }}" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" id="header">
    @include('partials.header')
    @yield('header')</div>
<div class="container-fluid" id="section-nav">
    @include('partials.nav')
</div>
<div class="container-fluid" id="banner">
    @yield('banner')
</div>
<div class="container-fluid" id="featured">@yield('featured')</div>
<div class="container-fluid" id="section-highlight">@yield('highlight')</div>
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
<div class="container-fluid" id="footer">
    @include('partials.footer')
    @yield('footer')
</div>
</body>
</html>
