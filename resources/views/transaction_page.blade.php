@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <h3>Транзакция</h3>
            <form method="POST" action="{{ route('transaction') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                    {{ __('Выполнить') }}
                </button>
                <input type="text" name="card" placeholder="№ карты" required autofocus>
                <input type="text" name="sum" placeholder="Сумма" required autofocus>
            </form>
        </div>
    </div>
@endsection
