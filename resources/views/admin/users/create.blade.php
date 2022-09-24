@extends('layouts.admin')
@section('title') Добавить пользователя @endsection
@section('content')
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            @include('inc.message')
            <form method="post" action="{{ route('admin.users.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input name="name" id="name" type="text" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" id="author" type="text" class="form-control" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="is_admin" class="form-label">Статус</label>
                    <select class="form-select" name="is_admin" id="is_admin">
                        <option value="">Выбрать статус</option>
                        <option value="true" @if((bool)old('is_admin') === true) selected @endif>Администратор</option>
                        <option value="false" @if((bool)old('is_admin') === false) selected @endif>Пользователь</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input name="password" id="password" type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Повторить пароль</label>
                    <input name="password_confirmation" id="password_confirmation" type="text" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
