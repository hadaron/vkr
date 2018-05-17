@extends('layouts.app')

@section('content')
    <h1>Admin page</h1>
    <a href="{{route('admin_registration')}}">Создать пользователя</a>
    <a href="">Создать партера</a>
    <a href="">Создать точку</a>
@endsection
