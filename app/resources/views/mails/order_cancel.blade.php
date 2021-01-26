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

        <h1>Заказ (#{{$order->id}}) отменен!</h1>
        <p><strong>{{$order->fio}}</strong>, спасибо, что продолжаете пользоваться DeliveryFood!</p>
    </div>

@endsection
