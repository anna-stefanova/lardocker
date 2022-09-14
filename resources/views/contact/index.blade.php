@extends('layouts.main')
@section('content')

<!-- Breadcrumb Start -->
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="/">Главная</a>
            <span class="breadcrumb-item active">Контакты</span>
        </nav>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Contact Start -->
<div class="container-fluid py-3">
    <div class="container">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Оставьте свой отзыв</h3>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="bg-light mb-3" style="padding: 30px;">
                    <h6 class="font-weight-bold">Свяжитесь с нами</h6>
                    <p>Labore ipsum ipsum rebum erat amet nonumy, nonumy erat justo sit dolor ipsum sed, kasd lorem sit et duo dolore justo lorem stet labore, diam dolor et diam dolor eos magna, at vero lorem elitr</p>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-map-marker-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Адрес</h6>
                            <p class="m-0">123 Street, New York, USA</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <i class="fa fa-2x fa-envelope-open text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Email</h6>
                            <p class="m-0">info@example.com</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-2x fa-phone-alt text-primary mr-3"></i>
                        <div class="d-flex flex-column">
                            <h6 class="font-weight-bold">Телефон</h6>
                            <p class="m-0">+012 345 6789</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="contact-form bg-light mb-3" style="padding: 30px;">
                    <div id="success"></div>
                    <form name="sentMessage" method="post" action="{{ route('contact.store', ['nameForm' => 'sentMessage']) }}" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input name="name" type="text" class="form-control p-4" id="name" placeholder="Имя" required data-validation-required-message="Введите ваше имя" value="{{ old('name') }}">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input name="email" type="email" class="form-control p-4" id="email" placeholder="Email" required data-validation-required-message="Введите ваш email" value="{{ old('email') }}">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <input name="theme" type="text" class="form-control p-4" id="subject" placeholder="Тема сообщения" required data-validation-required-message="Тема сообщения" value="{{ old('theme') }}">
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="comment" class="form-control" rows="4" id="message" placeholder="Сообщение" required data-validation-required-message="Сообщение">{!! old('comment') !!}</textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" id="sendMessageButton">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12 bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Форма заказа на получение выгрузки данных</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form bg-light mb-3" style="padding: 30px;">
                    <div id="success"></div>
                    <form name="sentOrder" method="post" action="{{ route('contact.store') }}" id="contactForm" novalidate="novalidate">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input name="name" type="text" class="form-control p-4" id="name" placeholder="Имя" required="required" data-validation-required-message="Введите ваше имя" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="control-group">
                                    <input name="email" type="email" class="form-control p-4" id="email" placeholder="Email" required="required" data-validation-required-message="Введите ваш email" />
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <input name="tel" type="tel" class="form-control p-4" id="subject" placeholder="Телефон" required="required" data-validation-required-message="Введите ваш номер телефона" />
                            <p class="help-block text-danger"></p>
                        </div>
                        <div class="control-group">
                            <textarea name="order" class="form-control" rows="4" id="message" placeholder="Необходимая информация" required="required" data-validation-required-message="Введите информацию, которую хотели бы получить"></textarea>
                            <p class="help-block text-danger"></p>
                        </div>
                        <div>
                            <button class="btn btn-primary font-weight-semi-bold px-4" style="height: 50px;" type="submit" id="sendMessageButton">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact End -->
@endsection
