<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Beginnerswedstrijd 2018</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Javascript Files -->
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
    <div class="container">
        <div class="navbar-nav">
            <a class="nav-link @if (Request::is('organisatie')) active @endif" href="{{ route('organisatie') }}">Organisatie</a>
            <a class="nav-link @if (Request::is('wedstrijd')) active @endif" href="{{ route('wedstrijd') }}">Wedstrijdleiding</a>
            <a class="nav-link @if (Request::is('scheidsrechter')) active @endif" href="{{ route('scheidsrechter') }}">Scheidsrechter</a>
            <a class="nav-link @if (Request::is('laders')) active @endif" href="{{ route('laders') }}">Laders</a>
        </div>
        <span class="navbar-text">Powered by SCC Powerhouse ©</span>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
