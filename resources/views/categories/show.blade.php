@extends('layouts.main')
@section('content')
    <div class="col-lg-8">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                    <h3 class="m-0">{{$category['title']}}</h3>
                </div>
            </div>
            @forelse($newsList as $news)
            <div class="col-lg-6">
                <div class="position-relative mb-3">
                    <img class="img-fluid w-100" src="{{ asset('assets/img/news-500x280-4.jpg') }}" style="object-fit: cover;">
                    <div class="overlay position-relative bg-light">
                        <div class="mb-2" style="font-size: 14px;">
                            <span>{{ $category['title'] }}</span>
                            <span class="px-1">/</span>
                            <span>{{$news['created_at']->format('d-m-Y H:i')}}</span>
                        </div>
                        <a class="h4" href="{{route('news.show', ['id' => $news['id']])}}">{{ $news['title'] }}</a>
                        <p class="m-0">{{ $news['description'] }}</p>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-lg-6">Записей нет</div>
            @endforelse
        </div>
    </div>
    <x-sidebar></x-sidebar>
@endsection
