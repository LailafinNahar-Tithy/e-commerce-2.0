<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><nav>
    <a href="{{url('/home')}}">Home</a>
    <a href="{{url('/contact')}}">Contact us</a>
    <a href="{{route('about')}}">About us</a>
    <a href="{{route('users')}}">Users Details</a>
</nav>
    <h1>This is user page</h1>
    <ol>
    @foreach ($users as $user )
        <li>{{$user->name}}</li>
    @endforeach
    </ol>
</body>
</html>
