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
                    <td>Процент</td>
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
                            <td>
                                <form method="POST" action="{{ route('admin_change_percent') }}">
                                    {{ csrf_field() }}
                                    <select class="form-control" name="percent">
                                        <option value="{{$partner->percent}}" selected>{{$partner->percent*100}}%</option>
                                        @for ($i = 1; $i <= 100; $i++)
                                            <option value="{{$i/100}}">{{$i}}%</option>
                                        @endfor
                                    </select>
                                    <input type="hidden" name="partner_id" value="{{$partner->id}}">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Обновить') }}
                                    </button>
                            </form>
                            </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
