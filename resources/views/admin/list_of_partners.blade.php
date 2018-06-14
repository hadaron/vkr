@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="form-control">
                <tr>
                    <td>Наименование</td>
                    <td>Полное наименование</td>
                    <td>ИНН</td>
                    <td>КПП</td>
                    <td>ОГРН</td>
                    <td>Расчётный счёт</td>
                    <td>Наименование банка</td>
                    <td>БИК</td>
                    <td>К/С</td>
                </tr>
                @foreach($partners as $partner)
                    <tr>
                        <td>{{$partner->name}}</td>
                        <td>{{$partner->full_name}}</td>
                        <td>{{$partner->inn}}</td>
                        <td>{{$partner->kpp}}</td>
                        <td>{{$partner->ogrn}}</td>
                        <td>{{$partner->rc}}</td>
                        <td>{{$partner->bank_name}}</td>
                        <td>{{$partner->bik}}</td>
                        <td>{{$partner->ks}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
