@extends('layouts.frontend')

@section('content')
<div class="container">
    <form action="{{route('orders.store')}}" method="POST" class="form-confirmation">

        {{csrf_field()}}
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title">Заказ</h3>
            </div>
            <div>
                <h3>Доставка из {{$restaurant->name}}:</h3>
            </div>

            <!-- /.modal-header -->
            <div class="modal-body">
                @foreach($goods as $position)
                    <div class="food-row food-row-order-confirmation">
                        <span class="food-name">{{$position[0]['name']}}</span>
                        <strong class="food-price">{{$position[0]['price']}} ₽</strong>
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
                        <input type="text" class="input input-fio" name="fio" @auth value="{{Auth::user()->account->FIO}}" @endauth required>
                    </div> 

                    <span>Email:</span>
                    <div style="margin-bottom: 12px;">
                        <input type="email" class="input input-email" name="email" @auth value="{{Auth::user()->email}}" @endauth required>
                    </div> 

                    <span>Телефон:</span>
                    <div style="margin-bottom: 12px;">
                        <input type="tel" class="input input-phone" name="tel" @auth value="{{Auth::user()->account->hone}}" @endauth required>
                    </div> 

                    <span>Адрес доставки:</span>
                    <div>
                        <input type="text" class="input input-address-delivery" name="address" @auth value="{{Auth::user()->account->address}}" @endauth required>
                    </div> 
                </div>
            </div>
            <input type="hidden" value="{{$order->id}}" name="order_on_queue">
            <!-- /.modal-body -->
            <div class="modal-footer">
                <span class="modal-price-tag order-total">{{$total}} ₽</span>
                <div class="footer-buttons">
                    <button type="submit" class="button button-primary">Оформить заказ</button>
                    <a class="button" href="{{route('order_cancel', $order->id)}}">Отмена</a>
                </div>
            </div>
            <!-- /.modal-footer -->
        </div>

    </form>

</div>

@endsection