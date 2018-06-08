@extends('layouts.app')

@section('content')
    <h1 align="center">Admin page</h1>

    <a href="{{route('admin_registration_client')}}">Создать пользователя</a>

    <a href="{{route('admin_registration_partner')}}">Создать партера</a>

    <a href="{{route('admin_registration_shop')}}">Создать точку</a>

    <a href="{{route('admin_registration_employee')}}">Создать сотрудника</a>


    <a href="{{route('admin_list_of_clients')}}">Список пользователей</a>

    <a href="{{route('admin_list_of_partners')}}">Список партнеров</a>

@endsection
