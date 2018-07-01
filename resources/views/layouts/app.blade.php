<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'iGot') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
<header>
    <figure>
        <img src="{{ asset('svg/logo.svg') }}">
    </figure>
    @guest
        <a class="right" href="{{ route('login') }}">{{ __('Авторизация') }}</a>
        <a class="nav-link" href="{{ route('register') }}">{{ __('Регистрация') }}</a>
    @else
        <form id="logout-form" action="{{ route('logout') }}" method="POST"
              style="display: none;">
            {{csrf_field()}}
            <input type="submit" placeholder="Выйти">
        </form>
    @endguest
</header>

<main class="py-4">
    @yield('content')
</main>
<footer>
    <section class="BlockFooterButton">
        <a class="" href="#">Реквизиты юрлица</a>
        <a class="" href="#">Правила использования Карты iGot</a>
    </section>
    <section class="BlockFooterButton">
        <a class="" href="#">Часто задаваемые вопросы</a>
        <a class="" href="#">Партнеры</a>
    </section>
    <article>
        <p>+7(863) 236-560-67</p>
        <p>info@igot.pro</p>
    </article>
</footer>

</body>
</html>

