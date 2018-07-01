@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="form-control">
                <thead class="thead-dark">
                <tr>
                    <td scope="col">Наименование</td>
                    <td scope="col">Полное наименование</td>
                    <td scope="col">ИНН</td>
                    <td scope="col">КПП</td>
                    <td scope="col">ОГРН</td>
                    <td scope="col">Расчётный счёт</td>
                    <td scope="col">Наименование банка</td>
                    <td scope="col">БИК</td>
                    <td scope="col">К/С</td>
                    <td scope="col">Процент</td>
                </tr>
                </thead>
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
                                <input type="submit" value="Отчёт">
                            </form>
                        </td>
                        <td>
                            <form action="{{route('admin_registration_partner')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="partner_id" value="{{$partner->id}}">
                                <input type="submit" value="Удалить партнёра">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
