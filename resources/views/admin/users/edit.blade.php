@extends('layouts.admin')
@section('title') Редактировать пользователя @endsection
@section('content')
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            @include('inc.message')
            <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input name="name" id="name" type="text" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="email" type="text" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="mb-3">
                    <label for="is_admin" class="form-label">Статус</label>
                    <select class="form-select" name="is_admin" id="is_admin">
                        <option value="">Выбрать статус</option>
                        <option value="1" @if ((boolean) $user->is_admin === true) selected @endif>Администратор</option>
                        <option value="0" @if ((boolean) $user->is_admin === false) selected @endif>Пользователь</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
