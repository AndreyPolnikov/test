@extends('admin.layouts.app_admin')

@extends('content')

<div class="container">
    @component('admin.components.breadcrumd')
        @slot('title') Редактирование категории @endslot
        @slot('parent') Главная @endslot
        @slot('active') Категории @endslot
    @endcomponent

    <hr>

    <form class="form-horizontal" action="{{route('admin.category2.update', $category2)}}" method="post">
        {{ csrf_field()  }}
        <input type="hidden" name="_method" value="put">
        {{-- Form include --}}
        @include('admin.categories.partials.form')

    </form>
</div>


