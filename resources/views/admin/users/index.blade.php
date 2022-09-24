@extends('layouts.admin')
@section('title') Пользователи @endsection
@section('content')
    <a  class="btn btn-outline-secondary mb-2" href="{{ route('admin.users.create') }}">Добавить пользователя</a>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Имя</th>
                <th scope="col">Email</th>
                <th scope="col">Статус</th>
                <th scope="col">Управление</th>
            </tr>
            </thead>
            <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if ($user->is_admin === true) Администратор @endif</td>
                    <td><a href="{{ route('admin.users.edit', ['user' => $user->id]) }}">Редактировать</a> &nbsp; <a href="#" style="color: red;">Удалить</a></td>
                </tr>
            @empty
                <tr><td colspan="4">Пользователей нет</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
