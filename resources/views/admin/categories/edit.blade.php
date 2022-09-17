@extends('layouts.admin')
@section('title') Редактировать категорию @endsection
@section('content')
    <div class="row">
        <div class="col-lg-7 col-md-12 col-sm-12">
            @include('inc.message')
            <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
                @csrf
                @method('put')
                <div class="mb-3">
                    <label for="title" class="form-label">Наименование</label>
                    <input type="text" name="title" class="form-control" id="title" aria-describedby="Category title" value="{{ $category->title }}">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Описание</label>
                    <textarea name="description" class="form-control" id="description" rows="3">{!! $category->description !!}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </form>
        </div>
    </div>
@endsection
