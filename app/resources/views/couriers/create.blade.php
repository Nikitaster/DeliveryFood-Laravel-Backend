@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Создать курьера</h1>

    <form method="POST" action="{{ route('couriers.store') }}">
        <h3 class="text-center">Данные для авторизации</h3>
        <hr>
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="login">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="test@mail.ru">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="repeat password">
            </div>
        </div>

        <h3 class="text-center">Персональные данные</h3>
        <hr>

        <div class="form-group row">
            <label for="FIO-input" class="col-md-4 col-form-label text-md-right">{{ __('FIO') }}</label>

            <div class="col-md-6">
                <input id="FIO-input" type="text" class="form-control @error('FIO') is-invalid @enderror" name="FIO" value="{{ old('FIO') }}" required autocomplete="Фамилия Имя Отчество" autofocus placeholder="Фамилия Имя Отчество">

                @error('FIO')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone-input" class="col-md-4 col-form-label text-md-right">{{ __('FIO') }}</label>

            <div class="col-md-6">
                <input id="phone-input" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="+7(123)456-78-90" autofocus placeholder="+7(123)456-78-90">

                @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Создать курьера
                </button>
            </div>
        </div>
    </form>
</div>
@endsection