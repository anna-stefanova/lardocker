@extends('layouts.main')
@section('content')
    <div class="col-lg-8">
        <!-- News Detail Start -->
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="{{ asset('/assets/img/news-500x280-4.jpg') }}" style="object-fit: cover;">
            <div class="overlay position-relative bg-light">
                <div class="mb-3">
                    <a href="{{route('categories.show', $news->category_id)}}">{{ $news->category->title }}</a>
                    <span class="px-1">/</span>
                    <span>{{ $news->author }}</span>
                    <span class="px-1">/</span>
                    <span>{{$news->created_at}}</span>
                </div>
                <div>
                    <h3 class="mb-3">{{ $news->title }}</h3>
                    {!! $news->description !!}
                </div>
            </div>
        </div>
        <!-- News Detail End -->

    </div>
    <x-sidebar></x-sidebar>
@endsection

