@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Ресторан "{{$restaurant->name}}"</h1>
        <div class="row">
            <p for="formFile" class="form-label col-md-6 m-auto">Название:</p>
        </div>
        <div class="mb-3">
            <input disabled class="form-control col-md-6 m-auto" type="text" name="name" placeholder="Название" required value="{{ $restaurant->name }}">
        </div>
        <div class="row">
            <p for="formFile" class="form-label col-md-6 m-auto">Адрес:</p>
        </div>
        <div class="mb-3">
            <input disabled class="form-control col-md-6 m-auto" type="text" name="address" placeholder="Адрес" required value="{{ $restaurant->address }}">
        </div>
        <div class="row">
            <p for="formFile" class="form-label col-md-6 m-auto">Категория:</p>
        </div>
        <div class="mb-3">
            <input disabled class="form-control col-md-6 m-auto" type="text" name="category" required value="{{$restaurant->category->name}}"></input>
        </div>
            
        <img class="rounded mx-auto d-block mb-3" src="{{$restaurant->image->path}}" style="width: 50%">
            
        <div class="col-md-6 m-auto" style="display: flex; flex-direction: row; justify-content: space-between"> 
        
            <form method="POST" action="{{url()->current()}}" id='delForm'>
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <div class="row ml-auto mr-auto">
                    <button type="button" class="btn btn-danger m-auto" onclick="if(confirm('Вы уверены, что хотите удалить ресторан {{$restaurant->name}}?')) {delForm.submit();}">Удалить</button>
                </div>
            </form>

            <form>
                <div class="row ml-auto mr-auto">
                    <a class="btn btn-secondary m-auto" href="{{route('managers.create', ['restaurant' => $restaurant->id])}}">Добавить менеджера</a>
                </div>
            </form>

            <form method="get" action="{{url()->current()}}/edit" enctype="multipart/form-data">
                <div class="row ml-auto mr-auto mb-3">
                    <button type="submit" class="btn btn-primary m-auto">Изменить</button>
                </div>
            </form>

            
        </div>

</div>

@endsection