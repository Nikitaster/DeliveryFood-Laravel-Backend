@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="cards" style="justify-content: center">
        <div class="card">
            <a href="{{route('restaurant', $restaurant->name)}}"><img class="card-image" src="{{ $restaurant->image->path }}" alt=""></a>
            <div class="card-text">
                <a href="{{route('restaurant', $restaurant->name)}}">
                    <div class="card-heading">
                        <h3 class="card-title"> {{ $restaurant->name }} </h3>
                        <span class="card-tag tag">50 мин</span>
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
                </a>
                <form action="{{route('add_rate')}}" method="POST">
                    <h3>Поставить оценку</h3>
                    <div class="card-buttons" style="justify-content: space-between;">
                        <input type="hidden" name="token" value="{{$token}}" />
                        {{csrf_field()}}
                        <button class="button" name="rate" value="1" type="submit">1</button>
                        <button class="button" name="rate" value="2" type="submit">2</button>
                        <button class="button" name="rate" value="3" type="submit">3</button>
                        <button class="button" name="rate" value="4" type="submit">4</button>
                        <button class="button" name="rate" value="5" type="submit">5</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection