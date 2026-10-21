@extends('layouts.app')

@section('title', $item['title'] . ' — Книжковий простір')

@section('content')
    <a class="back-link" href="{{ route('catalog.index') }}">← До каталогу</a>

    <article class="listing">
        <div class="listing__visual atlas-frame">
            <img class="listing__image atlas-frame__image atlas-frame__image--first"
                 src="{{ asset('images/catalog-atlas.png') }}"
                 alt="Книжкове видання: {{ $item['title'] }}" width="1774" height="887" fetchpriority="high">
            <span class="listing__stamp">{{ $item['operation'] }}</span>
        </div>
        <div class="listing__content">
            <p class="listing__eyebrow">{{ $item['category'] }} · {{ $item['operation'] }} · BK–{{ str_pad((string) $item['id'], 3, '0', STR_PAD_LEFT) }}</p>
            <h1 class="listing__title">{{ $item['title'] }}</h1>
            <p class="listing__author">Контакт: {{ $item['contact_name'] }}</p>
            <p class="listing__lead">{{ $item['description'] }}</p>
            <strong class="listing__price">{{ $item['price'] }} {{ $item['currency'] }}</strong>

            <dl class="attribute-list">
                @foreach ($item['attributes'] as $name => $value)
                    <div class="attribute-list__item">
                        <dt class="attribute-list__name">{{ $name }}</dt>
                        <dd class="attribute-list__value">{{ $value }}</dd>
                    </div>
                @endforeach
                <div class="attribute-list__item"><dt class="attribute-list__name">Статус</dt><dd class="attribute-list__value">{{ $item['status'] }}</dd></div>
                <div class="attribute-list__item"><dt class="attribute-list__name">Опубліковано</dt><dd class="attribute-list__value">{{ $item['published_at'] }}</dd></div>
            </dl>

            <div class="contact-card" id="contact">
                <div>
                    <p>Зацікавила пропозиція?</p>
                    <strong>{{ $item['contact_name'] }}</strong>
                    <p>{{ $item['contact_phone'] }}</p>
                    <p>{{ $item['contact_email'] }}</p>
                </div>
                <button class="button button--mustard" type="button"
                        data-action="request"
                        data-endpoint="/api/requests"
                        data-item="{{ $item['id'] }}">Домовитися про отримання</button>
            </div>
        </div>
    </article>
@endsection
