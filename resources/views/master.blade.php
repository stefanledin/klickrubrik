<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Klickrubrik - Förändrar allt</title>
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        
        @yield('body')
        
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>