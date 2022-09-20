@extends('layouts.admin')
@section('title') Добавить категорию @endsection
@section('content')
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    @include('inc.message', ['message' => $error])
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.categories.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input name="title" type="text" class="form-control" id="title" required aria-describedby="emailHelp" value="{{ old('title') }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{!! old('description') !!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
