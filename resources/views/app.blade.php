<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>interacpedia :: innovation 2.0</title>
    <link rel="shortcut icon" href="favicon.ico"/>
    <link href="{{ elixir('css/styles.css') }}" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid" id="header">
    @include('partials.header')
    @yield('header')</div>
<div class="container-fluid" id="navigation">
    @include('partials.nav')
</div>
<div class="container-fluid" id="banner">
    @include('partials.banner')
    @yield('banner')
</div>
<div class="container-fluid" id="featured">@yield('featured')</div>
<div class="container-fluid" id="highlight">@yield('highlight')</div>
<div class="container">
    @yield('content')
</div>
<div class="container-fluid"></div>
<div class="container-fluid"></div>
<div class="container-fluid"></div>
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
