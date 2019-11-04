<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Neucha|Montserrat|Rubik&display=swap" rel="stylesheet">    </head>
    <body style="overflow:hidden">
        <div id="app">
            <app></app>
        </div>
        <script src="https://api-maps.yandex.ru/2.1/?apikey=e8e74448-1c2c-46f7-b9d8-da7f5ce5f9b4&lang=ru_RU" type="text/javascript"></script>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
