<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="fb:app_id" content="<?php echo env('FB_APP_ID');?>">
        <meta property="og:type" content="website">
        <meta property="og:image" content="img/share-image.png">
        @section('head')
        @show
        <title>Klickrubrik - Förändrar allt</title>
        <link rel="stylesheet" href="{{ elixir('css/app.css') }}">
        <script src="https://use.typekit.net/ars2mhh.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
    </head>
    <body>
        
        @section('content')
        @show
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/vue.min.js"></script>
        <script src="{{ elixir('js/all.js') }}"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-31597184-50', 'auto');
            ga('send', 'pageview');
        </script>
    </body>
</html>