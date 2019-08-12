<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Events Calendar</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600,700" rel="stylesheet">

        <!-- Styles -->
        <!-- <link rel="stylesheet" href="{{asset('js/lib/jquery-ui-1.12.1/jquery-ui.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <style>
            * {
                font-family: "Nunito", sans-serif;
            }
        </style>
    </head>
    <body>
        <div id="app">
            <new-events-component/>
        </div>

        <!-- <script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script> -->
		<!-- <script src="{{asset('css/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script> -->
        <script src="js/app.js"></script>
    </body>
</html>
