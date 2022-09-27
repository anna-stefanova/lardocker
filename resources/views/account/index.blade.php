@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Добро пожаловать, {{ Auth::user()->name }}</h2>
        @if(\Auth::user()->is_admin === true)
        <a href="{{ route('admin.index') }}">Админ панель</a>
        @endif
    </div>
@endsection
