@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Создать категорию для ресторанов</h1>

    <form method="POST" action="{{ route('categories.store') }}">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="суши, пицца">

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Создать категорию
                </button>
            </div>
        </div>
    </form>
</div>
@endsection