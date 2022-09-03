<div class="col-lg-4 pt-3 pt-lg-0">

    <!-- Newsletter Start -->
    <div class="pb-3">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Подписка на новости</h3>
        </div>
        <div class="bg-light text-center p-4 mb-3">
            <p>Aliqu justo et labore at eirmod justo sea erat diam dolor diam vero kasd</p>
            <div class="input-group" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Ваш Email">
                <div class="input-group-append">
                    <button class="btn btn-primary">Подписаться</button>
                </div>
            </div>
            <small>Sit eirmod nonumy kasd eirmod</small>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Popular News Start -->
    <div class="pb-3">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Популярное</h3>
        </div>
        @forelse($newsList as $key => $news)
        <div class="d-flex mb-3">
            <img src="{{ asset('assets/img/news-100x100-1.jpg') }}" style="width: 100px; height: 100px; object-fit: cover;">
            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                <div class="mb-1" style="font-size: 13px;">
                    @foreach($categories as $category)
                        @if($category['id'] === $news['category_id'])
                            <a href="{{route('categories.show', ['id' => $category['id']])}}">{{ $category['title'] }}</a>
                        @endif
                    @endforeach
                    <span class="px-1">/</span>
                    <span>{{ $news['created_at']->format('d-m-Y H:i') }}</span>
                </div>
                <a class="h6 m-0" href="{{ route('news.show', ['id' => $key]) }}">{{ $news['title'] }}</a>
            </div>
        </div>
        @empty
            <div class="d-flex mb-3">
                Записей нет
            </div>
        @endforelse
    </div>
    <!-- Popular News End -->

    <!-- Tags Start -->
    <div class="pb-3">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Категории</h3>
        </div>
        <div class="d-flex flex-wrap m-n1">
            @forelse($categories as $category)
                <a href="{{route('categories.show', ['id' => $category['id']])}}" class="btn btn-sm btn-outline-secondary m-1">{{ $category['title'] }}</a>
            @empty
                <p>Категорий нет</p>
            @endforelse
        </div>
    </div>
    <!-- Tags End -->
</div>
