<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#5a2333">
    <title>@yield('title', 'Книжковий простір')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    @stack('styles')
</head>
<body class="page">
    <a class="skip-link" href="#main-content">Перейти до вмісту</a>

    <header class="site-header">
        <a class="site-header__brand" href="{{ route('home') }}">
            <span class="site-header__mark" aria-hidden="true">К</span>
            <span class="site-header__brand-copy">
                Книжковий простір
                <small class="site-header__subtitle">обмін і оренда книжок</small>
            </span>
        </a>

        <nav class="site-nav" aria-label="Головна навігація">
            <a class="site-nav__link {{ request()->routeIs('home') ? 'site-nav__link--active' : '' }}"
               href="{{ route('home') }}" {{ request()->routeIs('home') ? 'aria-current=page' : '' }}>Головна</a>
            <a class="site-nav__link {{ request()->routeIs('catalog.*') ? 'site-nav__link--active' : '' }}"
               href="{{ route('catalog.index') }}" {{ request()->routeIs('catalog.*') ? 'aria-current=page' : '' }}>Каталог</a>
        </nav>

        <div class="site-header__tools">
            <a class="site-header__contact" href="{{ route('catalog.index') }}">Знайти книжку</a>
            <x-notificationcenter />
        </div>
    </header>

    <main class="page__main" id="main-content">
        @yield('content')
    </main>

    <footer class="site-footer">
        <p class="site-footer__text">Іванченко Софія · 6.1224</p>
        <p class="site-footer__meta">Варіант 6 · service-list</p>
    </footer>

    <script src="{{ asset('js/partners.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
