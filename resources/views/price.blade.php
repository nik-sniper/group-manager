@extends('layout')

@section('main_content')


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">>

<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-white text-center">
    <h1 class="display-4">Цены</h1>
    <p class="lead">Предлагаем вам к расмотру наши тарифы с их базовыми ценами</p>
</div>

<div class="container">
    <div class="card-deck mb-3 text-center">
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Бесплатно</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">₽0 <small class="text-muted">/ мес</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary">Начать</button>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Про</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">₽1500 <small class="text-muted">/ мес</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary">Начать</button>
            </div>
        </div>
        <div class="card mb-4 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">Предприятие</h4>
            </div>
            <div class="card-body">
                <h1 class="card-title pricing-card-title">₽2900 <small class="text-muted">/ мес</small></h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                    <li>Дать Владу по ебалу</li>
                </ul>
                <button type="button" class="btn btn-lg btn-block btn-primary">Начать</button>
            </div>
        </div>
    </div>
</div>

@endsection
