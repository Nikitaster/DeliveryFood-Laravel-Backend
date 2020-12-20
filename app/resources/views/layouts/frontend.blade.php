<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Delivery Food – доставка еды на дом</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="./css/normalize.css"> -->
    <!-- <link rel="stylesheet" href="./css/animate.css"> -->
    <!-- <link rel="stylesheet" href="{{asset('css/app.css')}}" /> -->
    <link rel="stylesheet" href="{{asset('css/frontend.css')}}" />
    <script defer src="{{asset('js/frontend.js')}}"></script>
    <!-- <script defer src="./js/wow.min.js"></script> -->
    
</head>
<body>
    <div class="container">
        <!-- Шапка сайта -->
        <header class="header">
            <!-- Логотип -->
            <a href="/" class="logo"><img src="{{ asset('/images/logo.svg') }}" alt="Logo" /></a>
            <!-- Поле адреса -->
            <input type="text" class="input input-address" placeholder="Адрес доставки"/>
            <!-- Блок кнопок -->
            <div class="buttons">
            @guest
                <a class="button button-primary" href="{{ route('home') }}">
                    <img src="{{ asset('/images/user.svg') }}" alt="user" class="button-icon">
                    <span class="button-text">Войти</span>   
                </a>
            @else
                <a class="button button-primary" href="{{ route('home') }}">
                    <img src="{{ asset('/images/user.svg') }}" alt="user" class="button-icon">
                    <span class="button-text">{{ Auth::user()->name }}</span>   
                </a>
            @endguest
                <button class="button" id="cart-button">
                    <img src="{{ asset('/images/shopping-cart.svg') }}" alt="shopping cart" class="button-icon">
                    <span class="button-text">Корзина</span>  
                </button>          
            </div>
        </header>
    </div>

    <main>
    @yield('content')
    </main>
    
    <footer class="footer">
        <div class="container">
            <div class="footer-block">
                <img src="{{ asset('/images/logo.svg') }}" alt="" class="logo footer-logo">
                <nav class="footer-nav">
                    <a href="#" class="footer-link">Ресторанам</a>
                    <a href="#" class="footer-link">Курьерам</a>
                    <a href="#" class="footer-link">Пресс-центр</a>
                    <a href="#" class="footer-link">Контакты</a>
                </nav>
                <div class="social-links">
                    <a href="#" class="social-link"><img src="{{ asset('/images/instagram.svg') }}" alt=""></a>
                    <a href="#" class="social-link"><img src="{{ asset('/images/facebook.svg') }}" alt=""></a>
                    <a href="#" class="social-link"><img src="{{ asset('/images/vk.svg') }}" alt=""></a>
                </div>
            </div>
        </div>
    </footer>

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