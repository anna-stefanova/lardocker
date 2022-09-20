@extends('layouts.admin')
@section('title') Редактировать запись @endsection
@section('content')
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            @if($errors->any())
                @foreach($errors->all() as $error)
                    @include('inc.message', ['message' => $error])
                @endforeach
            @endif
            <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input name="title" id="title" type="text" class="form-control" aria-describedby="emailHelp" value="{{ $news->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" id="description" class="form-control" rows="3">{!! $news->description !!}</textarea>
                </div>
                <div class="mb-3">
                    <label for="author" class="form-label">Автор</label>
                    <input name="author" id="author" type="text" class="form-control" value="{{ $news->author }}">
                </div>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Выбрать категорию</label>
                    <select class="form-select" name="category_id" id="category_id">
                        <option>Выбрать категорию</option>
                        @forelse($categories as $category)
                            <option value="{{ $category->id }}" @if($news->category_id === $category->id) selected @endif>{{ $category->title }}</option>
                        @empty
                            <option value="0">Категорий нет</option>
                        @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Статус</label>
                    <select class="form-select" name="status" id="status" aria-label="Select status">
                        <option value="DRAFT" @if($news->status === "DRAFT") selected @endif>DRAFT</option>
                        <option value="ACTIVE" @if($news->status === "ACTIVE") selected @endif>ACTIVE</option>
                        <option value="BLOCKED" @if($news->status === "BLOCKED") selected @endif>BLOCKED</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image">
                    <label class="input-group-text" for="image">Изображение</label>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
