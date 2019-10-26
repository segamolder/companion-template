<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat|Rubik&display=swap" rel="stylesheet">    </head>
    <body style="overflow:hidden">
        <div id="app">
            <app></app>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
