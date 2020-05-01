@extends('admin.layouts.app_admin')

@extends('content')

<div class="container">
    @component('admin.components.breadcrumd')
        @slot('title') Создание категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent

    <hr>

    <form class="form-horizontal" action="{{route('admin.category2.store')}}" method="post">
        {{ csrf_field()  }}

        {{-- Form include --}}
        @include('admin.categories.partials.form')

    </form>
</div>


