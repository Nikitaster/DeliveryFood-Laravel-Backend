@extends('layouts.app')

@section('content')


<div class="container-fluid">
    <h1 class="text-center mb-3">Рестораны</h1>
    <table class="table">
    <thead class="text-center">
        <tr>
        <th scope="col">id</th>
        <th scope="col">Название</th>
        <th scope="col">Категория</th>
        <th scope="col">Адрес</th>
        <th scope="col">Изображение</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($restaurants as $restaurant)
            <tr>
            <th scope="row">{{ $restaurant->id }}</th>
                <td>{{ $restaurant->name }}</td>
                <td>{{ $restaurant->category_id }}</td>
                <td>{{ $restaurant->address }}</td>
                <td>{{ $restaurant->image_id }}</td>
            </tr>
        @endforeach
    </tbody>
    </table>
    {{ $restaurants->links("pagination::bootstrap-4") }}
</div>

@endsection