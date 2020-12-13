<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <div class="min-h-screen bg-gray-100">
    <body class="font-sans antialiased">
        
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-1 px-4 sm:px- lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                
                {{ $slot }}
            </main>


            <!-- Footer -->
            <footer style="display:flex; flex-direction: column;justify-content:space-around;
    text-align:center;margin:auto; width:100%;position:relative;bottom:0; padding-top:2em;">
                <p>CharoArc - <a href="https://en.wikipedia.org/wiki/Latin" target="_blank">Omnia Vincit Amor</a></p>
                <a href="https://www.he-arc.ch/ingenierie/bachelor-informatique-logicielle" target="_blank" >HEARC-Neuchâtel INF 3 DLM 2020</a>
            </footer>
        
    </body>
   
    </div>
</html>
