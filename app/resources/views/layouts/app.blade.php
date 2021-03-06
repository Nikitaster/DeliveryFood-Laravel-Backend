<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('extra_static')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('images/logo.svg')}}" class="d-inline-block align-top">
                    <!-- {{ config('app.name', 'Laravel') }} -->
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        Личный кабинет
                                    </a>
                                
                                    @if(Auth::user()->account->role->name == 'manager')
                                        <a class="dropdown-item" href="{{route('restaurant', Auth::user()->account->manager->restaurant->name)}}">
                                        Ресторан "{{Auth::user()->account->manager->restaurant->name}}"
                                        </a>
                                    @elseif(Auth::user()->account->role->name == 'admin')
                                        <a class="dropdown-item" href="{{route('restaurants.index')}}">
                                        Рестораны
                                        </a>
                                        <a class="dropdown-item" href="{{route('categories.index')}}">
                                        Категории ресторанов
                                        </a>
                                        <a class="dropdown-item" href="{{route('couriers.index')}}">
                                        Курьеры
                                        </a>
                                        <a class="dropdown-item" href="{{route('opened_orders')}}">
                                        Открытые заказы
                                        </a>
                                    @elseif(Auth::user()->account->role->name == 'courier')
                                        <a class="dropdown-item" href="{{route('opened_orders')}}">
                                        Открытые заказы
                                        </a>
                                        <a class="dropdown-item" href="{{route('couriers_orders_list')}}">
                                        Заказы в работе
                                        </a>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>


                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <div class="modal">
        <div class="modal-dialog">
            <div class="modal-header">
                <h3 class="modal-title">Корзина</h3>
                <button class="close">&times;</button>
            </div>
            <!-- /.modal-header -->
            <div class="modal-body">
                <div class="food-row">
                    <span class="food-name">Ролл угорь стандарт</span>
                    <strong class="food-price">250₽</strong>
                    <div class="food-counter">
                        <button class="counter-button">-</button>
                        <span class="counter">1</span>
                        <button class="counter-button">+</button>
                    </div>
                </div>
                <div class="food-row">
                    <span class="food-name">Ролл угорь стандарт</span>
                    <strong class="food-price">250₽</strong>
                    <div class="food-counter">
                        <button class="counter-button">-</button>
                        <span class="counter">1</span>
                        <button class="counter-button">+</button>
                    </div>
                </div>
                <div class="food-row">
                    <span class="food-name">Ролл угорь стандарт</span>
                    <strong class="food-price">250₽</strong>
                    <div class="food-counter">
                        <button class="counter-button">-</button>
                        <span class="counter">1</span>
                        <button class="counter-button">+</button>
                    </div>
                </div>
                <div class="food-row">
                    <span class="food-name">Ролл угорь стандарт</span>
                    <strong class="food-price">250₽</strong>
                    <div class="food-counter">
                        <button class="counter-button">-</button>
                        <span class="counter">1</span>
                        <button class="counter-button">+</button>
                    </div>
                </div>
                <div class="food-row">
                    <span class="food-name">Ролл угорь стандарт</span>
                    <strong class="food-price">250₽</strong>
                    <div class="food-counter">
                        <button class="counter-button">-</button>
                        <span class="counter">1</span>
                        <button class="counter-button">+</button>
                    </div>
                </div>
            </div>
            <!-- /.modal-body -->
            <div class="modal-footer">
                <span class="modal-price-tag">1250 ₽</span>
                <div class="footer-buttons">
                    <div class="button button-primary">Оформить заказ</div>
                    <div class="button" id="btn-close">Отмена</div>
                </div>
            </div>
            <!-- /.modal-footer -->
        </div>
    </div>

    
</body>
</html>
