@extends('layouts.frontend')

@section('content')
<div class="container">
    <section class="promo">
        <h1 class="promo-title">Онлайн-сервис<br>доставки еды на дом</h1>
        <p class="promo-text">Блюда из любимого ресторана привезет курьер в перчатках, маске и с антисептиком</p>
    </section>

    <section class="restaurants">
        @auth
            @if(Auth::user()->account->role->name == 'admin')
                <div class="add-position"><a href="{{route('restaurants.create')}}">Добавить ресторан</a></div>
            @endif
        @endauth
        <div class="section-heading">
            <h2 class="section-title">Рестораны</h2>
            <form method='GET' action='' class="restaurant-search-form">
                <input class="input input-search" placeholder="Поиск ресторанов" name="name" value="{{ $name }}" autocomplete="{{ $name }}"/>
            </form>
        </div>
        <div class="cards">

            @foreach($restaurants as $restaurant)

            <a href="{{route('restaurant', $restaurant->name)}}" class="card">
                <img class="card-image" src="{{ $restaurant->image->path }}" alt="">
                <div class="card-text">
                    <div class="card-heading">
                        <h3 class="card-title"> {{ $restaurant->name }} </h3>
                        <span class="card-tag tag">
                        @php
                        $amount = 0;
                        $time_in_seconds = 0;
                        foreach ($restaurant->orders as $order) {
                            if ($order->status->name == 'Завершен') {
                                $amount += 1;
                                $time_in_seconds += (int)(strtotime($order->updated_at) - strtotime($order->created_at));
                                // echo $time_in_seconds . '<br>';
                            }
                        }
                        if ($amount > 0) {
                            echo round($time_in_seconds / $amount / 60);
                        } else {
                            echo '-' ;
                        }
                        @endphp
                        мин
                        </span>
                    </div>
                    <!-- /.card-heading -->
                    <div class="card-info">

                        @if($restaurant->rates->first())
                        <div class="rating">
                        <img src="{{asset('/images/rating.svg')}}" alt="">
                         @php
                            $rates = $restaurant->rates;
                            $sum = 0;
                            $amount = 0;
                            foreach($rates as $rate) {
                                $sum += (int)$rate->rate;
                                $amount += 1;
                            }
                            echo round($sum / $amount, 2);
                         @endphp
                        </div>
                        @endif
                        
                        @if(!$restaurant->goods->isEmpty())
                            @php
                                $prices = $restaurant->goods->filter(function ($item) {
                                    return !is_null($item->price);
                                });
                                $min_price = $prices->min('price');
                                $min_price = 'От ' . $min_price . ' ₽';
                            @endphp
                        @else 
                            @php
                            $min_price = "Нет позиций";
                            @endphp
                        @endif
                        <div class="price">{{$min_price}}</div>
                        <div class="category"> {{ $restaurant->category->name }} </div>
                    </div>
                    <!-- /.card-info -->
                </div>
            </a>
            <!-- /.card -->

            @endforeach

        </div>
        <div class="pagination-container">
            {{ $restaurants->links("pagination::bootstrap-4") }}
        </div>
    </section>
</div>
@endsection