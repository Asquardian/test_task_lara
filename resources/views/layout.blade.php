<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset("bootstrap/css/bootstrap.min.css")}}">
    <link rel="stylesheet" href="{{asset("main.css")}}">
    <script src="{{asset("jquery.js")}}"></script>
    <script src="{{asset("mask.js")}}"></script>
    <script src="{{asset("bootstrap/js/bootstrap.min.js")}}"></script>
</head>
<body>
    <main>
        @yield('content')
    </main>
</body>
</html>