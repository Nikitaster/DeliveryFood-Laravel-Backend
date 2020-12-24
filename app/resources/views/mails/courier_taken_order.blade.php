@extends('layouts.email')

@section('content')
    <style>
        th, td {
            text-align: center;
        }
        a {
            text-decoration: none;
        }
    </style>

<div class="container">

    <h1>Заказ (#{{$order->id}}) уже в пути</h1>
    <p><strong>{{$order->fio}}</strong>, курьер уже в пути! Ваш заказ (#{{$order->id}}) на сумму <strong>{{$order->total}} ₽ </strong> из "{{$order->restaurant->name}}" скоро будет у вас!</p>
    <p>Связаться с курьером ({{$courier->fio}}): {{$courier->phone}}</p>
    
    <div class="modal-dialog">
            <div class="modal-header">
            <a href="{{route('orders.show', $order->id)}}"><h3 class="modal-title">Заказ #{{$order->id}}</h3></a>
            </div>
            <div>
                <h3>Доставка из {{$order->restaurant->name}}:</h3>
            </div>

            <!-- /.modal-header -->
            <div class="modal-body">
                @foreach(json_decode($order->goods) as $position)
                    <div class="food-row food-row-order-confirmation">
                        <span class="food-name">{{$position[0]->name}}</span>
                        <strong class="food-price">{{$position[0]->price}} ₽</strong>
                        <div class="food-counter">
                            <span class="counter">Количество: {{$position[1]}}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            <div>
                <h3>Контактные данные:</h3>
            </div>
            <div class="modal-body">
                <div class="form-confirmation">
                    <span>ФИО:</span>
                    <div style="margin-bottom: 12px">
                        <input type="text" class="input input-fio" value="{{$order->fio}}" disabled>
                    </div> 

                    <span>Email:</span>
                    <div style="margin-bottom: 12px;">
                        <input type="email" class="input input-email" value="{{$order->email}}" disabled>
                    </div> 

                    <span>Телефон:</span>
                    <div style="margin-bottom: 12px;">
                        <input type="tel" class="input input-phone" value="{{$order->tel}}" disabled>
                    </div> 

                    <span>Адрес доставки:</span>
                    <div>
                        <input type="text" class="input input-address-delivery" value="{{$order->address}}" disabled>
                    </div> 
                </div>
            </div>
            <input type="hidden" value="{{$order->id}}" name="order_on_queue">
            <!-- /.modal-body -->
            <div class="modal-footer">
                <span class="modal-price-tag order-total">{{$order->total}} ₽</span>
                <div class="footer-buttons">
                    @auth
                        @if(Auth::user()->account->role->name == 'courier')
                            <form action="{{route('order_complete', $order->id)}}" method="POST">
                                {{csrf_field()}}
                                <button type="submit" class="button button-primary" name="order" value="{{$order->id}}">Завершить доставку</button>
                            </form>
                        @endif
                    @endauth
                </div>
            </div>
            <!-- /.modal-footer -->
        </div>

        </div>
@endsection
