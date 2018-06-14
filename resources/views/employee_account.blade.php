@extends('layouts.app')

@section('content')
    <div class="form-group row">
        <div class="form-group">
            <form method="POST" action="{{ route('search_client') }}">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-primary">
                    {{ __('Поиск') }}
                </button>
                <input id="request" type="text"
                       name="request" required autofocus>
            </form>
        </div>
    </div>
@endsection
