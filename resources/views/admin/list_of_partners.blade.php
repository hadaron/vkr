@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>Наименование</th>
                    <th>Полное наименование</th>
                    <th>ИНН</th>
                    <th>КПП</th>
                    <th>ОГРН</th>
                    <th>Расчётный счёт</th>
                    <th>Наименование банка</th>
                    <th>БИК</th>
                    <th>К/С</th>
                    <th>Процент</th>
                    <th align="center">Отчет</th>
                    <th>Удалить партнера</th>
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
                                    <option value="{{$partner->percent[count($partner->percent) - 1]->percent}}"
                                            selected>{{$partner->percent[count($partner->percent) - 1]->percent*100}}%
                                    </option>
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
                        <td>
                            <form action="{{route('report')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="partner_id" value="{{$partner->id}}">
                                <button type="submit" class="btn btn-primary">{{ __('Отчёт') }}</button>
                            </form>
                        </td>
                        <td>
                            <form action="{{route('admin_registration_partner')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="partner_id" value="{{$partner->id}}">
                                <button type="submit" class="btn btn-primary">{{ __('Удалить партнёра') }}</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
