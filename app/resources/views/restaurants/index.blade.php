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
        <th scope="col">Менеджеры</th>
        <th scope="col">Адрес</th>
        <th scope="col">Изображение</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($restaurants as $restaurant)
            <tr>
                <th class="text-center" scope="row">{{ $restaurant->id }}</th>
                <td class="text-center"><a href="{{ url('restaurants', $restaurant->id) }}">{{ $restaurant->name }}</a></td>
                <td class="text-center">{{ $restaurant->category->name }}</td>
                <td class="text-center">
                    <ul style="list-style-type: none; padding: 0">
                        @foreach ($restaurant->managers as $manager)
                            <li><a href="{{url('managers', $manager->id)}}">{{$manager->account->user->name}}</a></li>    
                        @endforeach
                    </ul>
                </td>
                <td class="text-center">{{ $restaurant->address }}</td>
                <td class="text-center"><a href="{{ $restaurant->image->path }}">Ссылка на изображение</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <div class="d-flex mr-3 justify-content-end">
        {{ $restaurants->links("pagination::bootstrap-4") }}
    </div>
</div>

@endsection