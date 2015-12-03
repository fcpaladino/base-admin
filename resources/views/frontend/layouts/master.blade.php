<!DOCTYPE html>
<html dir="ltr" lang="pt-BR">
<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <base href="{{ URL::to('/') }}/">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">

    <title>{{ $title or Config::get('website.global.title') }}</title>

    <meta name="robots" content="index, follow">
    <meta name="revisit-after" content="1 day">
    <meta name="distribution" content="Global">
    <meta name="language" content="pt-br">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- ICONS -->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="image/png">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon57.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/favicon72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/favicon114.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('images/favicon144.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/favicon144.png') }}">

    <!-- SEO -->
    <meta name="description" content="{{ $seoDescription or '' }}">
    <meta name="keywords" content="{{ $seoKeywords  or '' }}">
    <link rel="canonical" href="{{ Request::url() }}">

    <!-- CSS -->
    @include('frontend.includes.stylesheet')
</head>

<body class="">
<div class="loader">
    <span class="animated bounceInDown"></span>
</div>

@include('frontend.includes.header')

@yield('content')

@include('frontend.includes.footer')

<!-- JAVASCRIPTS -->
@include('frontend.includes.javascripts')

</body>

</html>
