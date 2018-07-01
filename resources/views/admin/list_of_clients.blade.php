@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="table table-hover">
                <thead>
                <tr>
                    <td>Номер телефона</td>
                    <td>Email</td>
                    <td>Фамилия</td>
                    <td>Имя</td>
                    <td>Номер карты</td>
                    <td>Кэшбэк</td>
                    <td>Сумма покупок</td>
                    <td>Удалить</td>
                </tr>
                </thead>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->user['phone']}}</td>
                        <td>{{$client->user['email']}}</td>
                        <td>{{$client->last_name}}</td>
                        <td>{{$client->first_name}}</td>
                        <td>{{$client->card_number}}</td>
                        <td>{{$client->cashback_history->sum('cashback')}}</td>
                        <td>{{$client->cashback_history->sum('sum')}}</td>
                        <td>
                            <form action="{{route('client_remove')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$client->id}}">
                                <input type="submit" value="Удалить">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
