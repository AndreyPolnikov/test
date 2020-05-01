@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumd')
            @slot('title') Список категорий @endslot
            @slot('parent') Главная @endslot
            @slot('active') Категории @endslot
        @endcomponent

        <hr>

        <a href="{{route('admin.category.create')}}" class="pull-right"><i class=""></i>Создать категорию</a>
        <table>
            <thead>
            <th>Наименование</th>
            <th>Публикация</th>
            <th>Действие</th>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{$category->title}}</td>
                        <td>{{$category->publish}}</td>
                        <td>
                            <a href="{{route('admin.category.edit', $category)}}"></a>
                        </td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="3">Данные отсутствуют</td>
                        </tr>
                    @endforelse
            </tbody>
        </table>

    </div>

@endsection
