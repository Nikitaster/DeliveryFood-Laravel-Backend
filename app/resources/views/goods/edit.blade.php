@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Редактировать позицию {{$good->name}} </h1>
    
        <form method="POST" action="{{route('goods.update', $good->id)}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <input type="hidden" name="restaurant" value="{{$good->restaurant}}"/>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Наименование:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto @error('name') is-invalid @enderror" type="text" name="name" placeholder="Название" required value="{{$good->name}}">
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
                <input class="form-control col-md-6 m-auto @error('description') is-invalid @enderror" type="text" name="description" placeholder="Описание" required value="{{$good->description}}">
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
                <input class="form-control col-md-6 m-auto @error('price') is-invalid @enderror" type="text" name="price" placeholder="Цена" required value="{{$good->price}}">
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
                <input class="col-md-6 m-auto @error('image') is-invalid @enderror" type="file" id="formFile" name="image" >
                @error('image')
                    <p class="invalid-feedback text-center" role="alert">
                        <strong>{{ $message }}</strong> 
                    </p>
                @enderror
            </div>
            <div class="col-md-6 m-auto">
                <div class="d-flex justify-content-around">
                    <span class="row">
                        <button type="button" class="btn btn-danger m-auto" onclick="if(confirm('Вы уверены, что хотите удалить позицию {{$good->name}}?')) {delForm.submit();}">
                            Удалить
                        </button>
                    </span>
                    <span class="row">
                        <button type="submit" class="btn btn-primary m-auto">
                            Сохранить
                        </button>
                    </span>
                </div>
            </div>
        </form>

        <form action="{{route('goods.destroy', $good->id)}}" method="POST" id="delForm">
            {{ csrf_field() }}
            @method('DELETE')
        </form>

</div>

@endsection