<!-- Topbar Start -->
<div class="container-fluid">

    <div class="row align-items-center py-2 px-lg-5">
        <div class="col-lg-4">
            <a href="" class="navbar-brand d-none d-lg-block">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
            </a>
        </div>
        <div class="col-lg-8 text-center text-lg-right">
            @php echo date("l, F j, Y") @endphp
        </div>
    </div>

</div>
<!-- Topbar End -->

<!-- Navbar Start -->
<div class="container-fluid p-0 mb-3">

    <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
        <a href="" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span>Room</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
            <div class="navbar-nav mr-auto py-0">
                <a href="#" class="nav-item nav-link">Главная</a>
                <a href="{{ route('news.index') }}" class="nav-item nav-link active">Все новости</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Категории</a>
                    <div class="dropdown-menu rounded-0 m-0">
                        @foreach($categories as $category)
                            <a href="{{ route('categories.show', ['id' => $category['id']]) }}" class="dropdown-item">{{ $category['title'] }}</a>
                        @endforeach
                    </div>
                </div>
                <a href="{{ route('contact.index') }}" class="nav-item nav-link">Контакты</a>
            </div>
            <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                <input type="text" class="form-control" placeholder="Поиск">
                <div class="input-group-append">
                    <button class="input-group-text text-secondary"><i
                            class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </nav>

</div>
<!-- Navbar End -->
