@extends('layouts.admin')
@section('content')
    <h2>Все новости</h2>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Автор</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата добавления</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($newsList as $key => $news)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $news['title'] }}</td>
                    <td>{{ $news['author'] }}</td>
                    <td>DRAFT</td>
                    <td>{{ $news['created_at']->format('d-m-Y H:i') }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $key]) }}">Редактировать</a> &nbsp; <a href="#" style="color: red;">Удалить</a></td>
                </tr>
            @empty
                <tr><td colspan="6">Записей нет</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
