<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App Name - @yield('title')</title>
</head>
<body>
@yield('tests')
       <ul>
           <li>Main</li>
           <li>About Us</li>
       </ul>
    @show
    <div class="container">
        @yield('content')
    </div>

<footer>
    This is footer
</footer>
</body>
</html>
