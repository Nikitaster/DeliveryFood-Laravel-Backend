@extends('layouts.frontend')

@section('content')
<div class="container">

    <section class="restaurants">
        <div class="section-heading">
            <h2 class="section-title restaurant-name">{{ $restaurant->name }}</h2>
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
            <div class="category">{{ $restaurant->category->name }}</div>
            @auth
                @if(Auth::user()->account->role->name == 'manager')
                    @if(Auth::user()->account->manager->restaurant->id === $restaurant->id)
                        <div class="add-position"><a href="{{route('goods.create', 'restaurant='.$restaurant->name)}}">Добавить позицию</a></div>
                    @endif
                @elseif(Auth::user()->account->role->name == 'admin')
                <div class="add-position"><a href="{{route('restaurants.show', $restaurant->id)}}">Редактировать ресторан</a></div>
                @endif
            @endauth
        </div>
        <div class="cards">
            @foreach($goods as $good)
                <div class="card">
                    <img class="card-image" src="{{ $good->image->path }}" alt="">
                    <div class="card-text card-text-good">
                        <div class="card-heading">
                            <h3 class="card-title card-title-reg">{{ $good->name }}</h3>
                            @auth
                                @if(Auth::user()->account->role->name == 'manager')
                                    @if(Auth::user()->account->manager->restaurant->id === $restaurant->id)
                                    <div class="add-position"><a href="{{route('goods.edit', $good->id)}}">Редактировать</a></div>
                                    @endif
                                @endif
                            @endauth
                        </div>
                        <!-- /.card-heading -->
                        <div class="restaurant-card-info">
                            <div class="ingredients">{{ $good->description }}</div>
                        </div>
                        <!-- /.card-info -->
                        <div class="card-buttons">
                            <button class="button button-primary add-to-busket-btn" name="{{$good->name}}" value="{{$good->price}}">
                                <span class="button-card-text">В корзину</span>
                                <img src="{{ asset('images/shopping-cart2.svg') }}" alt="shopping-cart" class="button-cart-image">
                            </button>
                            <div class="card-price-bold"><strong>{{ $good->price }}₽</strong></div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            @endforeach

        </div>

        <div class="pagination-container">
            {{ $goods->links("pagination::bootstrap-4") }}
        </div>
    </section>
</div>
@endsection