@extends('layouts.main')
@section('content')
    <div class="col-lg-8">
        <!-- News Detail Start -->
        <div class="position-relative mb-3">
            <img class="img-fluid w-100" src="{{ asset('assets/img/news-700x435-2.jpg') }}" style="object-fit: cover;">
            <div class="overlay position-relative bg-light">
                <div class="mb-3">
                @foreach($categories as $category)
                    @if($category['id'] === $news['category_id'])
                        <a href="{{route('categories.show', ['id' => $category['id']])}}">{{ $category['title'] }}</a>
                    @endif
                @endforeach
                    <span class="px-1">/</span>
                    <span>{{ $news['author'] }}</span>
                    <span class="px-1">/</span>
                    <span>{{$news['created_at']->format('d-m-Y H:i')}}</span>
                </div>
                <div>
                    <h3 class="mb-3">{{ $news['title'] }}</h3>
                    {!! $news['description'] !!}
                </div>
            </div>
        </div>
        <!-- News Detail End -->

    </div>
    <x-sidebar></x-sidebar>
@endsection

