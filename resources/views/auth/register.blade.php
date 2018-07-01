<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="{{asset('css/main.css')}}"/>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>
<body>
<header>
    <figure>
        <img src="{{asset('svg/logo.svg')}}">
    </figure>
</header>
<main>
    <section class="MainBlock">
        <article class="BlockCard">
            <figure>
                <img class="ImgRegister" src="{{asset('svg/logo-card.svg')}}">

                <form class="ClassForm" method="POST" action="{{ route('register') }}">
                    {{csrf_field()}}
                    <section class=" BlockCardInput">
                        <input type="text" name="first_name" placeholder="Имя"
                               class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                               value="{{ old('first_name') }}" required autofocus>
                        @if ($errors->has('first_name'))
                            <p>{{ $errors->first('first_name') }}<p>
                                @endif
                                <input type="text" name="last_name" placeholder="Фамилия"
                                       class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                       value="{{ old('last_name') }}" required autofocus>
                            <p>{{ $errors->first('last_name') }}</p>
                    </section>
                    <section class="BlockCardInput">
                        <input type="email" name="email" placeholder="E-mail"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                               value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <p>{{ $errors->first('email') }}</p>
                        @endif
                        <input type="tel" name="phone" placeholder="79281234567"
                               class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}"
                               value="{{ old('phone') }}" required autofocus>
                        @if ($errors->has('phone'))
                            <p>{{ $errors->first('phone') }}</p>
                        @endif
                    </section>
                    <section class="BlockCardInputTel">
                        <section class="BlockCardInputPerson">
                            <input type="password" name="password" placeholder="Пароль" required autofocus>
                        </section>
                        <section class="BlockCardInputPerson2">
                            <input type="checkbox" required autofocus>
                            <label><a href="https://docs.google.com/document/d/1-4vMPqIffo_ijkyCcSxQcpihEH8TtAgIq16sBNDoXHk/edit?usp=sharing">Согласен на обработку персональных данных и получение информации от ООО
                                    «Профплатформа»</a></label>
                        </section>
                    </section>
                    <input type="submit" value="Зарегистрироваться" class="ButtonOrd">
                </form>
            </figure>
        </article>
    </section>
</main>
<footer>
    <section class="BlockFooterButton">
        <a class="" href="">Реквизиты юрлица</a>
        <a class="" href="">Правила использования Карты iGot</a>
    </section>
    <section class="BlockFooterButton">
        <a class="" href="">Часто задаваемые вопросы</a>
        <a class="" href="">Партнеры</a>
    </section>
    <article>
        <p>+7(863) 236-560-67</p>
        <p>info@igot.pro</p>
    </article>
</footer>
</body>
</html>