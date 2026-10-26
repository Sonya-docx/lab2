@props(['item', 'featured' => false])

@if ($featured)
    <article class="catalog-card {{ $item['id'] === 1 ? 'catalog-card--featured' : '' }} book-card">
        <a class="book-card__media atlas-frame" href="{{ route('catalog.show', ['slug' => $item['slug']]) }}">
            <img class="catalog-card__image atlas-frame__image atlas-frame__image--{{ ['first', 'second', 'third'][($item['id'] - 1) % 3] }}"
                 src="{{ asset('images/catalog-books.png') }}" alt="Книжкове видання: {{ $item['title'] }}" width="1774" height="887" loading="lazy">
            <span class="book-card__badge">{{ $item['operation'] }}</span>
        </a>
        <div class="book-card__body">
            <p class="catalog-card__eyebrow">{{ $item['category'] }} · {{ $item['operation'] }}</p>
            <h3 class="catalog-card__title">{{ $item['title'] }}</h3>
            <p class="catalog-card__description">{{ $item['short_description'] }}</p>
            <div class="book-card__footer">
                <strong class="catalog-card__price">{{ $item['price'] }} {{ $item['currency'] }}</strong>
                <a class="text-link" href="{{ route('catalog.show', ['slug' => $item['slug']]) }}">До книги →</a>
            </div>
        </div>
    </article>
@else
    <article class="catalog-card service-card {{ $item['id'] === 1 ? 'catalog-card--featured' : '' }}">
        <div class="service-card__media atlas-frame">
            <img class="catalog-card__image atlas-frame__image atlas-frame__image--{{ ['first', 'second', 'third'][($item['id'] - 1) % 3] }}"
                 src="{{ asset('images/catalog-books.png') }}" alt="Книжкове видання: {{ $item['title'] }}" width="1774" height="887" loading="lazy">
            <span class="service-card__status">{{ $item['operation'] }}</span>
        </div>
        <div class="service-card__content">
            <div class="service-card__top">
                <p class="catalog-card__eyebrow">{{ $item['category'] }} · {{ $item['operation'] }}</p>
                <p class="service-card__code">BK–{{ str_pad((string) $item['id'], 3, '0', STR_PAD_LEFT) }}</p>
            </div>
            <h2 class="catalog-card__title">{{ $item['title'] }}</h2>
            <p class="catalog-card__description">{{ $item['description'] }}</p>
            <ul class="service-card__features">
                @foreach ($item['attributes'] as $name => $value)
                    <li>{{ $name }}: {{ $value }}</li>
                @endforeach
            </ul>
        </div>
        <div class="service-card__aside">
            <strong class="catalog-card__price">{{ $item['price'] }} {{ $item['currency'] }}</strong>
            <span>{{ $item['status'] === 'published' ? 'Доступно' : $item['status'] }}</span>
            <a class="service-card__button" href="{{ route('catalog.show', ['slug' => $item['slug']]) }}">Переглянути книгу</a>
        </div>
    </article>
@endif
