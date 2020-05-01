<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="{{ asset('css/test.css') }}" rel="stylesheet">
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
        </div>

        <div>
            <h2>Update</h2>
            @for ($i = 0; $i <= count($users) - 1; $i++)
                <li><a href="http://localhost/laravel/blog/public/updateUser={{$users[$i]->id}}">{{$users[$i]->name}}</a></li>
            @endfor
        </div>
        <div>
            <h2>Delete</h2>
            @for ($i = 0; $i <= count($users) - 1; $i++)
                <li><a href="http://localhost/laravel/blog/public/deleteUser={{$users[$i]->id}}">{{$users[$i]->name}}</a></li>
            @endfor
        </div>

        <div>
            <ul>

                @foreach(range(date('Y')-5, date('Y')) as $y)
                    {{$y}}
                @endforeach
            </ul>
        </div>

        <div class="links">6
            <a href="https://laravel.com/docs">Docs</a>
            <a href="https://laracasts.com">Laracasts</a>
            <a href="https://laravel-news.com">News</a>
            <a href="https://blog.laravel.com">Blog</a>
            <a href="https://nova.laravel.com">Nova</a>
            <a href="https://forge.laravel.com">Forge</a>
            <a href="https://vapor.laravel.com">Vapor</a>
            <a href="https://github.com/laravel/laravel">GitHub</a>
        </div>
    </div>
</div>
</body>
</html>