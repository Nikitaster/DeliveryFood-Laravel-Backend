@extends('layouts.app')

@section('content')
<div class="container">
    @isset($order)
    <div class="card p-5 m-3">


        <h1 class="text-center mb-3"><a href="{{route('orders.show', $order[0]->id)}}">Заказ #{{$order[0]->id}}</a></h1>
        <div class="row">
            <div class="card mb-3 col-md-6 p-0" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <a href="{{route('restaurant', $order[0]->restaurant->name)}}"><img src="{{$order[0]->restaurant->image->path}}" class="card-img" alt="..." style="height: 100%; object-fit: cover;"></a>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <a href="{{route('restaurant', $order[0]->restaurant->name)}}">
                                <h5 class="card-title">Ресторан "{{$order[0]->restaurant->name}}"</h5>
                            </a>
                            <hr>
                            <p class="card-text">Адрес ресторана: {{$order[0]->restaurant->address}}</p>
                            <p class="card-text">Адрес доставки: {{$order[0]->address}}</p>
                            <p class="card-text">Клиент: {{$order[0]->fio}}</p>
                            <p class="card-text">Телефон: {{$order[0]->tel}}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- <h2 class="text-center mt-5">Позиции:</h2> -->

            <div class="col-md-6 mb-auto">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th scope="col">Позиция</th>
                            <th scope="col">Кол-во</th>
                            <th scope="col">Цена</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(json_decode($order[0]->goods) as $position)
                        <tr>
                            <th scope="row">{{$position[0]->name}}</th>
                            <td>{{$position[0]->price}} ₽</td>
                            <td>{{$position[1]}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tr>
                        <th>Итого:</th>
                        <td></td>
                        <td>{{$order[0]->total}} ₽</td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="row ml-auto">
            @auth
                @if(Auth::user()->account->role->name == 'courier')
                    <form action="{{route('order_complete', $order[0]->id)}}" method="POST">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger" name="order" value="{{$order[0]->id}}">Завершить доставку</button>
                    </form>
                @endif
            @endauth
            <!-- /.modal-footer -->
        </div>

    </div>

    <div class="d-flex justify-content-center">
        {{$order}}
    </div>
    @else
    <h4 class="text-center">Пусто</h4>
    @endisset
</div>
@endsection


<!-- 
Название ресторана
Адрес ресторана
Адрес доставки
Позиции 
-->