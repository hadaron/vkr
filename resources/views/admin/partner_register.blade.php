@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Register') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin_registration_partner') }}">
                            {{ csrf_field() }}

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Название') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="full_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Полное наименование') }}</label>

                                <div class="col-md-6">
                                    <input id="full_name" type="text"
                                           class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}"
                                           name="full_name" value="{{ old('full_name') }}" required autofocus>

                                    @if ($errors->has('full_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="inn"
                                       class="col-md-4 col-form-label text-md-right">{{ __('ИНН') }}</label>

                                <div class="col-md-6">
                                    <input id="inn" type="text"
                                           class="form-control{{ $errors->has('inn') ? ' is-invalid' : '' }}"
                                           name="inn" value="{{ old('inn') }}" autofocus>

                                    @if ($errors->has('inn'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('inn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="kpp"
                                       class="col-md-4 col-form-label text-md-right">{{ __('КПП') }}</label>

                                <div class="col-md-6">
                                    <input id="kpp" type="text"
                                           class="form-control{{ $errors->has('kpp') ? ' is-invalid' : '' }}"
                                           name="kpp" value="{{ old('kpp') }}" autofocus>

                                    @if ($errors->has('kpp'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('kpp') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ogrn"
                                       class="col-md-4 col-form-label text-md-right">{{ __('ОГРН') }}</label>

                                <div class="col-md-6">
                                    <input id="ogrn" type="text"
                                           class="form-control{{ $errors->has('ogrn') ? ' is-invalid' : '' }}"
                                           name="ogrn" value="{{ old('ogrn') }}" autofocus>

                                    @if ($errors->has('ogrn'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ogrn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rc"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Расчётный счёт') }}</label>

                                <div class="col-md-6">
                                    <input id="rc" type="text"
                                           class="form-control{{ $errors->has('rc') ? ' is-invalid' : '' }}"
                                           name="rc" value="{{ old('rc') }}" autofocus>

                                    @if ($errors->has('rc'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bank_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Наименование банка') }}</label>

                                <div class="col-md-6">
                                    <input id="bank_name" type="text"
                                           class="form-control{{ $errors->has('bank_name') ? ' is-invalid' : '' }}"
                                           name="bank_name" value="{{ old('bank_name') }}" autofocus>

                                    @if ($errors->has('bank_name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bank_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="bik"
                                       class="col-md-4 col-form-label text-md-right">{{ __('БИК') }}</label>

                                <div class="col-md-6">
                                    <input id="bik" type="text"
                                           class="form-control{{ $errors->has('bik') ? ' is-invalid' : '' }}"
                                           name="bik" value="{{ old('bik') }}" autofocus>

                                    @if ($errors->has('bik'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bik') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ks"
                                       class="col-md-4 col-form-label text-md-right">{{ __('КС') }}</label>

                                <div class="col-md-6">
                                    <input id="ks" type="text"
                                           class="form-control{{ $errors->has('ks') ? ' is-invalid' : '' }}"
                                           name="ks" value="{{ old('ks') }}" autofocus>

                                    @if ($errors->has('ks'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('ks') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
