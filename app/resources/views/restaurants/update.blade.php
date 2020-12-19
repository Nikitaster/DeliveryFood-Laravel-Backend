@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Редактировать ресторан "{{$restaurant->name}}"</h1>
    
        <form method="POST" action="{{url('restaurants', $restaurant->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Название:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto @error('name') is-invalid @enderror" type="text" name="name" placeholder="Название" required value="{{ $restaurant->name }}">
                @error('name')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Адрес:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto @error('address') is-invalid @enderror" type="text" name="address" placeholder="Адрес" required value="{{ $restaurant->address }}">
                @error('address')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Категория:</p>
            </div>
            <div class="mb-3">
                <select class="form-control col-md-6 m-auto @error('category') is-invalid @enderror" type="text" name="category" required >
                    <option disabled selected>Выберите</option>
                    @foreach($categories as $category)
                        <option @if ($restaurant->category->id === $category->id) selected @endif >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <!-- <div class=""> -->
                <img class="rounded mx-auto d-block" src="{{$restaurant->image->path}}" style="width: 50%">
            <!-- </div> -->
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Изображение:</p>
            </div>
            <div class="mb-3 row">
                <input class="col-md-6 m-auto @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
                @error('image')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row ml-auto mr-auto">
                <button type="submit" class="btn btn-primary col-md-6 m-auto">Сохранить</button>
            </div>
        </form>

</div>

@endsection