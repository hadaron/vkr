@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="row">
            <div class="center-block">
                <a href="{{view('transaction_page')}}"></a>
            <h3>Поиск клиента</h3>

            <form method="POST" action="{{ route('search_client') }}" class="form-inline">
                {{ csrf_field() }}
                <input type="text" name="request" placeholder="Телефон/№ карты" class="form-control mr-sm-2 " required
                       autofocus>
                <button type="submit" class="btn btn-primary">
                    {{ __('Поиск') }}
                </button>
            </form>
        </div>
        </div>
    </div>
@endsection
