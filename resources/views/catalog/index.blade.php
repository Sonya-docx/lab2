@extends('layouts.app')

@section('title', 'Каталог — Книжковий простір')

@section('content')
    <section class="service-hero">
        <div>
            <p class="eyebrow">12 оголошень у каталозі</p>
            <h1 class="service-hero__title">Знайдіть книжку<br><em>для себе.</em></h1>
        </div>
        <div class="service-hero__summary">
            <p>Обирайте книжки для обміну або оренди. У кожному оголошенні є опис, ціна та умови.</p>
            <strong>Обмін / оренда</strong>
        </div>
    </section>

    <div class="service-layout">
        <aside class="service-sidebar">
            <p class="service-sidebar__title">Розділи</p>
            <nav class="category-nav" aria-label="Категорії каталогу">
                <a class="category-nav__item category-nav__item--active" href="{{ route('catalog.index') }}">Усі книжки <span>{{ count($items) }}</span></a>
                <a class="category-nav__item" href="{{ route('catalog.index', ['category' => 'Художня']) }}">Художня</a>
                <a class="category-nav__item" href="{{ route('catalog.index', ['category' => 'Професійна']) }}">Професійна</a>
                <a class="category-nav__item" href="{{ route('catalog.index', ['category' => 'Дитяча']) }}">Дитяча</a>
            </nav>
            <div class="service-sidebar__help">
                <strong>Маєте книжку, якою готові поділитися?</strong>
                <p>Знайдіть нового читача, запропонувавши книжку для обміну або оренди.</p>
                <a href="{{ route('catalog.index') }}">Переглянути каталог →</a>
            </div>
        </aside>

        <section class="service-results" aria-label="Оголошення каталогу">
            <div class="service-toolbar">
                <p>Показано {{ count($items) }} з 12</p>
                <div class="service-chips"><span class="service-chip service-chip--active">Усі оголошення</span></div>
            </div>
            <div class="service-catalog">
                @foreach ($items as $item)
                    <x-catalogcard :item="$item" />
                @endforeach
            </div>
        </section>
    </div>
@endsection
