@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <table class="form-control">
                <tr>
                    <td>Фамилия</td>
                    <td>Имя</td>
                </tr>
                @foreach($partners as $partner)
                    <tr>
                        <td>{{$partner->email}}</td>
                        <td>{{$partner->phone}}</td>
                        <td>{{$partner->name}}</td>
                        <td>{{$partner->full_name}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
