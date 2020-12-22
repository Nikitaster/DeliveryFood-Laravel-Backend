@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Создать менеджера</h1>

    <form method="POST" action="{{ route('managers.store') }}">
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


        <h3 class="text-center">Ресторан</h3>
        <hr>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Ресторан</label>

            <div class="col-md-6">
                @if ($curr_restaurant)
                    <input list="restaurantsList"  placeholder="Начните писать или выберите ресторан" id="restaurant" type="text" class="form-control @error('restaurant') is-invalid @enderror" name="restaurant" value="{{ $curr_restaurant->name }}" required  readonly>
                @else
                    <input list="restaurantsList"  placeholder="Начните писать или выберите ресторан" id="restaurant" type="text" class="form-control @error('restaurant') is-invalid @enderror" name="restaurant" value="{{ old('restaurant') }}" required autocomplete="restaurant">
                    <datalist id="restaurantsList">
                        @foreach ($restaurants as $rest)
                        <option>{{$rest->name}}</option>
                        @endforeach
                    </datalist>
                @endif
                @error('restaurant')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Создать менеджера
                </button>
            </div>
        </div>
    </form>
</div>
@endsection