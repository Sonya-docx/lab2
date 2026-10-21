@extends('layouts.app')

@section('title', 'Головна — Книжковий простір')

@section('content')
    <section class="book-hero">
        <div class="book-hero__copy">
            <p class="eyebrow">Незалежна книжкова добірка</p>
            <h1 class="book-hero__title">Книги, до яких хочеться <em>повертатися.</em></h1>
            <p class="book-hero__lead">Обмінюйтеся книжками або беріть їх в оренду — відкривайте нові історії без зайвих витрат.</p>
            <a class="button" href="{{ route('catalog.index') }}">Переглянути каталог</a>
        </div>
        <form class="book-search" action="{{ route('catalog.index') }}" method="get">
            <p class="book-search__title">Знайти наступну книжку</p>
            <fieldset class="operation-switch">
                <legend class="visually-hidden">Операція</legend>
                <label class="operation-switch__option"><input type="radio" name="operation" value="exchange" checked><span>Обмін</span></label>
                <label class="operation-switch__option"><input type="radio" name="operation" value="rent"><span>Оренда</span></label>
            </fieldset>
            <label class="field"><span class="field__label">Назва або автор</span><input class="field__control" type="search" name="query" placeholder="Почніть вводити…" autocomplete="off"></label>
            <div class="book-search__row">
                <label class="field"><span class="field__label">Категорія</span><select class="field__control" name="category"><option value="">Усі категорії</option><option>Художня</option><option>Професійна</option><option>Дитяча</option></select></label>
                <label class="field"><span class="field__label">Бюджет, ₴</span><input class="field__control" type="number" name="budget" placeholder="до 180" min="0"></label>
            </div>
            <button class="button button--mustard" type="submit">Шукати в каталозі</button>
        </form>
    </section>

    <section class="book-section book-section--recommendations" aria-labelledby="recommended-books-title">
        <div class="book-section__heading">
            <div><p class="eyebrow">Добірка для читання</p><h2 class="book-section__title" id="recommended-books-title">Рекомендовані книжки</h2></div>
            <a class="text-link" href="{{ route('catalog.index') }}">Усі 12 видань →</a>
        </div>
        <div class="book-grid">
            @foreach ($items as $item)
                <x-catalogcard :item="$item" :featured="true" />
            @endforeach
        </div>
    </section>

    @if (isset($items[0]))
        <section class="reading-note" id="featured" aria-labelledby="book-pick-title">
            <div class="atlas-frame reading-note__media">
                <img class="atlas-frame__image atlas-frame__image--first" src="{{ asset('images/catalog-atlas.png') }}" alt="Добірка книжок для обміну та оренди" width="1774" height="887" loading="lazy">
            </div>
            <div class="reading-note__content">
                <p class="eyebrow">Рекомендація спільноти</p>
                <h2 class="reading-note__title" id="book-pick-title">{{ $items[0]['title'] }}</h2>
                <p>{{ $items[0]['description'] }}</p>
                <div class="reading-note__meta">
                    <span>{{ $items[0]['category'] }}</span><span>{{ $items[0]['operation'] }}</span><strong>{{ $items[0]['price'] }} {{ $items[0]['currency'] }}</strong>
                </div>
                <a class="button" href="{{ route('catalog.show', ['slug' => $items[0]['slug']]) }}">Переглянути оголошення</a>
            </div>
        </section>
    @endif

    <section class="partners" aria-labelledby="partners-title">
        <div class="partners__heading">
            <div><p class="partners__eyebrow">Співпраця</p><h2 class="partners__title" id="partners-title">Наші партнери</h2></div>
            <p class="partners__text">Компанії, які допомагають перевіряти пропозиції, організовувати отримання та підтримувати якість сервісу.</p>
        </div>
        <div class="partners__slider" data-partners-slider>
            <button class="partners__control" type="button" data-action="partners-previous" aria-label="Показати попередні логотипи" aria-controls="partners-viewport" disabled>
                <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="m15 5-7 7 7 7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
            </button>
            <div class="partners__viewport" id="partners-viewport" data-partners-viewport role="region" aria-label="Логотипи партнерів" tabindex="0">
                <div class="partners__track">
                    <div class="partner-logo"><svg class="partner-logo__icon" width="76" height="76" aria-hidden="true"><use href="{{ asset('images/partner-logos.svg#logo-nova') }}"></use></svg><span class="partner-logo__name">NOVA</span></div>
                    <div class="partner-logo"><svg class="partner-logo__icon" width="76" height="76" aria-hidden="true"><use href="{{ asset('images/partner-logos.svg#logo-orbit') }}"></use></svg><span class="partner-logo__name">ORBIT</span></div>
                    <div class="partner-logo"><svg class="partner-logo__icon" width="76" height="76" aria-hidden="true"><use href="{{ asset('images/partner-logos.svg#logo-vector') }}"></use></svg><span class="partner-logo__name">VECTOR</span></div>
                    <div class="partner-logo"><svg class="partner-logo__icon" width="76" height="76" aria-hidden="true"><use href="{{ asset('images/partner-logos.svg#logo-form') }}"></use></svg><span class="partner-logo__name">FORMA</span></div>
                    <div class="partner-logo"><svg class="partner-logo__icon" width="76" height="76" aria-hidden="true"><use href="{{ asset('images/partner-logos.svg#logo-pulse') }}"></use></svg><span class="partner-logo__name">PULSE</span></div>
                    <div class="partner-logo"><svg class="partner-logo__icon" width="76" height="76" aria-hidden="true"><use href="{{ asset('images/partner-logos.svg#logo-nexus') }}"></use></svg><span class="partner-logo__name">NEXUS</span></div>
                </div>
            </div>
            <button class="partners__control" type="button" data-action="partners-next" aria-label="Показати наступні логотипи" aria-controls="partners-viewport">
                <svg viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path d="m9 5 7 7-7 7" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" /></svg>
            </button>
        </div>
    </section>
@endsection
