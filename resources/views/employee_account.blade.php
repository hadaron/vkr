@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <h3>Поиск клиента</h3>
            <form method="POST" action="{{ route('search_client') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary" >
                    {{ __('Поиск') }}
                </button>
                <input  type="text" name="request" placeholder="Телефон/№ карты" required autofocus>
            </form>
        </div>
    </div>
@endsection
