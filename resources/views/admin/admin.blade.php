@extends('layouts.app')

@section('content')
    <h1>Admin page</h1>
    <a href="{{route('admin_registration_client')}}">Создать пользователя</a>
    <a href="{{route('admin_registration_partner')}}">Создать партера</a>
    <a href="{{route('admin_registration_shop')}}">Создать точку</a>
    <a href="{{route('admin_list_of_clients')}}">Список пользователей</a>
    <a href="{{route('admin_list_of_partners')}}">Список партнеров</a>
@endsection
