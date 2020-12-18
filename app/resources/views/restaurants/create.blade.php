@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Добавить Ресторан</h1>
    
        <form method="POST" action="{{url('restaurants')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Название:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto" type="text" name="name" placeholder="Название" required>
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Адрес:</p>
            </div>
            <div class="mb-3">
                <input class="form-control col-md-6 m-auto" type="text" name="address" placeholder="Адрес" required>
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Категория:</p>
            </div>
            <div class="mb-3">
                <select class="form-control col-md-6 m-auto" type="text" name="category" required>
                    <option disabled selected>Выберите</option>
                    <option value="Текст1">Текст1</option>
                    <option value="Текст2">Текст2</option>
                </select>
            </div>
            <div class="row">
                <p for="formFile" class="form-label col-md-6 m-auto">Изображение:</p>
            </div>
            <div class="mb-3 row">
                <input class="col-md-6 m-auto" type="file" id="formFile" name="image" required>
            </div>
            <div class="row ml-auto mr-auto">
                <button type="submit" class="btn btn-primary col-md-6 m-auto">Создать</button>
            </div>
        </form>

</div>

@endsection