<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>Post</title>
</head>
<body>
    <div class="container">
        <header><a href="{{route("posts.index")}}"><i class="fas fa-home"></i></a></header>
        @yield('content')
    </div>

</body>
</html>