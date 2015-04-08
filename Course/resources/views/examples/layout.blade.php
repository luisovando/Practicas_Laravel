<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Curso de Laravel 5')</title>
    <link rel="stylesheet" href="css/app.css"/>
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/style.css" type="text/css"/>
</head>
<body>
<p class="logo">
    <img src="assets/styde.png" alt="200"/>
</p>
@yield('content')
<p class="bottom">
    https://twitter.com/l10
    @yield('footer')
</p>
</body>
</html>