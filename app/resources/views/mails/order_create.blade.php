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

    <h1>Информация о заказе (#{{$order->id}})</h1>
    <p><strong>{{$order->fio}}</strong>, ваш заказ (#{{$order->id}}) на сумму <strong>{{$order->total}} ₽ </strong> из "{{$order->restaurant->name}}" успешно подтвержден!</p>
    <p>Ожидайте курьера в течении часа.</p>
    
    <br>
    <h3>Ваш заказ:</h3>
    <table>
        <thead>
            <tr>
            <th scope="col">Позиция</th>
            <th scope="col">Количество</th>
            <th scope="col">Итого</th>
            </tr>
        </thead
        <tbody>
            @php
            $positions = json_decode($order->goods);
            foreach($positions as $position) {
                echo    '<tr>' . '<th scope="row">' . $position[0]->name . '</th>' .
                    '<td>' . $position[1] . '</td>' .
                    '<td>' . (int)$position[0]->price * (int)$position[1] . ' ₽' . '</td>' .
                '</tr>';
            }
            echo '<tr><th>Итого:</th><td></td><td>' . $order->total . ' ₽' . '</td></tr>';
            @endphp
        </tbody>
    </table>

    <a href="{{route('orders.show', $order->id)}}">Подробнее</a>
@endsection
