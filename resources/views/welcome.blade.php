<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<header>
    <figure>
        {{--<img src="{{asset('svg/logo.svg')}}">--}}
    </figure>
</header>
<main>
    <section class="MainBlock">
        <article class="BlockTitle">
            <h2>Карта iGot для покупок и платежей</h2>
        </article>
        <article class="BlockCard">
            <figure>
{{--                <img class="ImgCard" src="{{asset('svg/logo-card.svg')}}">--}}
                <figcaption>Карта выгодных<br> покупок</figcaption>
                <figcaption class="Number">9884 2372 7432 6985</figcaption>
            </figure>
        </article>
    </section>
</main>
<footer>
    <section class="CardZ">
        <a class="FooterButton1" href="{{route('register')}}">Зарегистрироваться</a>
        <a class="FooterButton2" href="{{route('login')}}">Авторизоваться</a>
    </section>
    <article>
        <p>+7(863) 236-560-67</p>
        <p>info@igot.pro</p>
    </article>

</footer>
</body>
