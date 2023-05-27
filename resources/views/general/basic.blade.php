<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-color/2.1.2/jquery.color.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.10/dist/sweetalert2.all.min.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script>
        <link href="https://fonts.googleapis.com/css?family=Roboto:100&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/3.1.2/fullpage.min.css"/>
        @vite(['./resources/css/app.scss', './resources/js/app.js'])
        <title>RIFORT - {{ $titulo }}</title>
    </head>
    <body style="background: {{ !empty($fundo) ? $fundo : '#141414' }}">
        @section('header')
            @include('general._layouts.header')
        @show
        <div id="app">
            @yield('conteudo')
        </div>
        @section('footer')
            @include('general._layouts.footer')
        @show
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('assets.js')
    </body>
</html>