@extends('layouts.admin')
@section('content')
    <h2>Категории</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Описание</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category['id'] }}</td>
                    <td>{{ $category['title'] }}</td>
                    <td>{{ $category['description'] }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category['id']]) }}">Редактировать</a> &nbsp; <a href="#" style="color: red;">Удалить</a></td>
                </tr>
            @empty
                <tr><td colspan="4">Категорий нет</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection