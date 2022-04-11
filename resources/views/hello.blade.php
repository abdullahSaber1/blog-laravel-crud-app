<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hello Message</title>
</head>
<body>

<h1>Hello {{$name}}</h1>

<h2>age : {{$age}}</h2>

@foreach($clubs as $club)
   <h2>club : {{$club}}</h2>


@endforeach


</body>
</html>
