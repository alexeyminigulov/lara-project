<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Adverts</title>
@yield('meta')

<!-- Styles -->
    <link href="{{ mix('css/app.css', 'build') }}" rel="stylesheet">
</head>
<body id="app">
<header>

</header>

<main class="app-content py-3">
    <div class="container">
        @yield('content')
    </div>
</main>

<!-- Scripts -->
<script src="{{ mix('js/app.js', 'build') }}"></script>
@yield('scripts')
</body>
</html>
