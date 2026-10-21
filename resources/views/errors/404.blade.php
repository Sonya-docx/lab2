@extends('layouts.app')

@section('title', 'Сторінку не знайдено - Книжковий простір')

@section('content')
    <section class="status-page">
        <p class="status-page__code" aria-hidden="true">404</p>
        <div>
          <p class="eyebrow">Сторінку загублено між полицями</p>
          <h1 class="status-page__title">Такої книги тут немає.</h1>
          <p class="status-page__text">
            Перевірте адресу або поверніться до актуальної добірки.
          </p>
          <a class="button" href="{{ route('home') }}">До книгарні</a>
        </div>
    </section>
@endsection