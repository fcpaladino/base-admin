<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="base" content="{{ url() }}" />
    <title>{{ $title or '' }}</title>

    @include('backend.includes.stylesheet')
</head>

<body class="skin-blue sidebar-mini">

<div class="wrapper">

    @include('backend.includes.header')

    @include('backend.includes.sidebar')

    <div class="content-wrapper">

        <section class="content">
            @include('backend.includes.errorlist')
            @yield('content')
        </section>
    </div>

     @include('backend.includes.footer')
</div>

@include('backend.includes.javascripts')

</body>
</html>
