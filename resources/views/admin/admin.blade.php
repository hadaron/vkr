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
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <h1 align="center">Admin page</h1>
    <ul class="navbar-nav ">
        <li class="nav-item active"><a href="{{route('admin_registration_client')}}" class="nav-link">Создать
                пользователя</a></li>

        <li class="nav-item active"><a href="{{route('admin_registration_partner')}}" class="nav-link">Создать
                партера</a></li>

        <li class="nav-item active"><a href="{{route('admin_registration_shop')}}" class="nav-link">Создать
                точку</a></li>

        <li class="nav-item active"><a href="{{route('admin_registration_employee')}}" class="nav-link">Создать
                сотрудника</a></li>

        <li class="nav-item active"><a href="{{route('admin_list_of_clients')}}" class="nav-link">Список
                пользователей</a></li>

        <li class="nav-item active"><a href="{{route('admin_list_of_partners')}}" class="nav-link">Список
                партнеров</a></li>
    </ul>
</nav>
</body>
</html>
