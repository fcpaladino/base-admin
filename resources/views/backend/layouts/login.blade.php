<!doctype html>
<html>
<head>
    <meta name="base" content="{{ url() }}" />
    <title>{{ $title or 'Nome do Site' }}</title>

    @include('backend.includes.stylesheet')
</head>

<body class="login-page">

@yield('content')

@include('backend.includes.javascripts')

</body>
</html>
