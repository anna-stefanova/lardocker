@extends('layouts.admin')
@section('title') Категории @endsection
@section('content')
    <a  class="btn btn-outline-secondary mb-2" href="{{ route('admin.categories.create') }}">Добавить категорию</a>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Описание</th>
                <th scope="col">Дата создания</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">Редактировать</a> &nbsp; <a href="#" style="color: red;">Удалить</a></td>
                </tr>
            @empty
                <tr><td colspan="4">Категорий нет</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
