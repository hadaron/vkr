@extends('layouts.app')
@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="form-control">
                <thead>
                <tr>
                    <td>Номер телефона</td>
                    <td>Email</td>
                    <td>Фамилия</td>
                    <td>Имя</td>
                    <td>Номер карты</td>
                    <td>Кэшбэк</td>
                    <td>Сумма покупок</td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{$client->user['phone']}}</td>
                    <td>{{$client->user['email']}}</td>
                    <td>{{$client->last_name}}</td>
                    <td>{{$client->first_name}}</td>
                    <td>{{$client->card_number}}</td>
                    <td>{{$client->cashback_history->sum('cashback')}}</td>
                    <td>{{$client->cashback_history->sum('sum')}}</td>
                </tr>
                </tbody>
            </table>
            <h2>История</h2>
            <table>
                <thead>
                <tr>
                    <td>Магазин</td>
                    <td>Сумма покупки</td>
                    <td>Кэшбэк</td>
                    <td>Дата</td>
                </tr>
                </thead>
                <tbody>
                @foreach($client->cashback_history as $transaction)
                    <td>{{$transaction->shop['name']}}</td>
                    <td>{{$transaction['sum']}}</td>
                    <td>{{$transaction['cashback']}}</td>
                    <td>{{$transaction['created_at']}}</td>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
