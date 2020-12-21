@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Добавить позицию в {{$restaurant}}  </h1>
    
        <form method="POST" action="{{url('goods')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="restaurant" value="{{$restaurant}}"/>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Наименование:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto @error('name') is-invalid @enderror" type="text" name="name" placeholder="Название" required>
                @error('name')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Описание:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto @error('description') is-invalid @enderror" type="text" name="description" placeholder="Описание" required>
                @error('description')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Цена:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto @error('price') is-invalid @enderror" type="text" name="price" placeholder="Цена" required>
                @error('price')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Изображение:</p>
            </div>
            <div class="mb-3 row">
                <input class="col-md-6 m-auto @error('image') is-invalid @enderror" type="file" id="formFile" name="image" required>
                @error('image')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="row ml-auto mr-auto">
                <button type="submit" class="btn btn-primary col-md-6 m-auto">Создать</button>
            </div>
        </form>

</div>

@endsection