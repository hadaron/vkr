@extends('layouts.app')

@section('content')
    <main>
        <section class="MainBlock">
            <article class="BlockCard">
                <figure>
                    <img class="ImgRegister" src="{{asset('svg/logo-card.svg')}}">
                    <form class="ClassForm" method="post" action="{{route('login')}}">
                        {{csrf_field()}}
                        <section class="BlockCardInput">
                            <input id="email" type="email"
                                   class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="email"
                                   value="{{ old('email') }}" required autofocus>
                        </section>
                        <section class="BlockCardInputTelAuth">
                            <section class="BlockCardInputPerson">
                                <input id="password" type="password" placeholder="password"
                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                       name="password" required>
                            </section>
                            <section class="BlockCardInputPerson2Auth">
                                <label>
                                    <input type="checkbox"
                                           name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Запомнить меня') }}
                                </label>
                            </section>
                        </section>
                        <input type="submit" value="Войти" class="ButtonOrd">
                    </form>
                </figure>
            </article>
        </section>
    </main>
@endsection
