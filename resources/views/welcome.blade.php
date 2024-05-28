<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="{{url('/home')}}">Home</a>
        <a href="{{url('/contact')}}">Contact us</a>
        <a href="{{route('about')}}">About us</a>
    </nav>
    <h1>Wlcome to laravel Learning Academy</h1>
</body>
</html>
