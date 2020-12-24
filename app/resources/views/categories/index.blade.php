@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Категории</h1>
    <a class="btn btn-primary col-md-2 d-block m-auto" href="{{route('categories.create')}}">Создать</a>
    <div style="overflow-x: auto">
        <table class="table mt-3">
        <thead class="text-center">
            <tr>
            <th scope="col">id</th>
            <th scope="col">Наименование</th>
            <th scope="col">Удаление</th>
            </tr>
        </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <th class="text-center" scope="row">{{ $category->id }}</th>
                        <td class="text-center">{{ $category->name }}</td>
                        <td class="text-center">
                            <form method="POST" action="{{route('categories.destroy', $category->id)}}"> 
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" style="border: none; background: none;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection