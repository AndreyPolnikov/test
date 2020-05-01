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

    <div>
        <form method="post" action="http://localhost/laravel/blog/public/registerUser">
            {{csrf_field()}}

            <p><input type="text" name="name" value=""></p>
            <p><input type="text" name="email" value=""></p>
            @if(session('errorRegister') == 1)
                Email has been already exist
            @endif
            <p><input type="password" name="password" value=""></p>
            @if(session('errorRegister') == 2)
               Password length less than 8 symbols
            @endif
            <input type="submit" value="Send">
        </form>
    </div>
</div>

</body>
</html>
