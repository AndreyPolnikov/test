 @extends('layouts.master')
 @section('title', 'Page TEst')
    @section('content')
        <div class="flex-center position-ref full-height">

            @section('tests', $tests)
            <div class="content">
                <div class="title m-b-md">
                </div>
                <div>
                    <a href="http://localhost/laravel/blog/public/insert/Kiril/kiril@gmail.com/3213123">Insert</a>

                </div>
                <div>
                    <h2>Update</h2>
                    @for ($i = 0; $i <= count($users) - 1; $i++)
                        <li><a href="http://localhost/laravel/blog/public/updateUser/{{$users[$i]->id}}">{{$users[$i]->name}}</a></li>
                    @endfor
                </div>
                <div>
                    <h2>Delete</h2>
                    @for ($i = 0; $i <= count($users) - 1; $i++)
                        <li><a href="http://localhost/laravel/blog/public/deleteUser/{{$users[$i]->id}}">{{$users[$i]->name}}</a></li>
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
    @stop
 @extends('layouts.sidebar')

