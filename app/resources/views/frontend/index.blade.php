@extends('layouts.frontend')

@section('content')
<div class="container">
    <section class="promo">
        <h1 class="promo-title">Онлайн-сервис<br>доставки еды на дом</h1>
        <p class="promo-text">Блюда из любимого ресторана привезет курьер в перчатках, маске и с антисептиком</p>
    </section>

    <section class="restaurants">
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
                        <span class="card-tag tag">50 мин</span>
                    </div>
                    <!-- /.card-heading -->
                    <div class="card-info">
                        <div class="rating">
                            <img src="./img/rating.svg" alt="">
                            4.5
                        </div>
                        <div class="price">От 900 ₽</div>
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