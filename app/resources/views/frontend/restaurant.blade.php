@extends('layouts.frontend')

@section('content')
<div class="container">

    <section class="restaurants">
        <div class="section-heading">
            <h2 class="section-title">PizzaBurger</h2>
            <div class="rating">
                <img src="{{asset('img/rating.svg')}}" alt="">
                4.5
            </div>
            <div class="price">От 900 ₽</div>
            <div class="category">Пицца</div>
        </div>
        <div class="cards">
            @foreach($restaurant->goods as $good)
                <div class="card">
                    <img class="card-image" src="./img/sushi01.png" alt="">
                    <div class="card-text">
                        <div class="card-heading">
                            <h3 class="card-title card-title-reg">Ролл угорь стандарт</h3>
                        </div>
                        <!-- /.card-heading -->
                        <div class="restaurant-card-info">
                            <div class="ingredients">Рис, угорь, соус унаги, кунжут, водоросли нори.</div>
                        </div>
                        <!-- /.card-info -->
                        <div class="card-buttons">
                            <button class="button button-primary">
                                <span class="button-card-text">В корзину</span>
                                <img src="./img/shopping-cart2.svg" alt="shopping-cart" class="button-cart-image">
                            </button>
                            <div class="card-price-bold"><strong>250 ₽</strong></div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            @endforeach

        </div>
    </section>
</div>
@endsection