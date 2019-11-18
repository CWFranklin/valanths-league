<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @component('components.navbar', [ 'home' => true ]) @endcomponent

        <main class="py-4" role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Welcome to Valanth's League!</h1>
                    <p class="lead">We run League of Legends tournaments for everyone from Iron to Diamond.</p>
                    <hr class="my-4">
                    <p>If you want to play or just come talk to us, join our Discord server.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="https://discord.gg/ADHb2UT" role="button" target="_blank">Join Server</a>
                    </p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
