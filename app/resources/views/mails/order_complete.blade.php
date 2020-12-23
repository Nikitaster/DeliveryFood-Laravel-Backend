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

    <h1>Заказ завершен!</h1>
    <p><strong>{{$order->fio}}</strong>, спасибо за ваш заказ! Приятного аппетита!</p>
    
    <span>Пожалуйста, оцените ресторан "{{$order->restaurant->name}}" по ссылке: </span>
    <a href="{{route('rate', $rate_token)}}">тут будет ссылка</a>

@endsection
