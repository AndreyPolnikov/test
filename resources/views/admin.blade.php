@extends('layouts.master')
@section('title', 'Page Title')
@section('content')
<div class="flex-center position-ref full-height">
    <form method="post" action="http://localhost/laravel/blog/public/auth">
        {{csrf_field()}}
        <input name="email" type="email">
        @if(session('errorAuth') == 'email')
         Error email
         @endif
        <input name="password" type="password">
        @if(session('errorAuth') == 'password')
            Error pass
        @endif
        <input type="submit" value="Send">
    </form>
</div>
@stop

