@extends('layouts.app')
@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="form-control">
                <tr>
                    <td>id</td>
                    <td>user_id</td>
                    <td>Фамилия</td>
                    <td>Имя</td>

                    <td>Номер карты</td>
                    <td>Кэшбэк</td>
                    <td>Сумма покупок</td>
                </tr>
                @foreach($clients as $client)
                    <tr>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->email}}</td>
                        <td>{{$client->last_name}}</td>
                        <td>{{$client->first_name}}</td>
                        <td>{{$client->card_number}}</td>
                        <td>{{$client->cashback}}</td>
                        <td>{{$client->sum}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
@endsection
