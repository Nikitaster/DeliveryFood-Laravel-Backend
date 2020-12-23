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
    <script defer src="{{asset('js/busket.js')}}"></script>
    <!-- <script defer src="./js/wow.min.js"></script> -->
    
</head>
<body>
    <div class="container">
        <!-- Шапка сайта -->
        <header class="header">
            <!-- Логотип -->
            <a href="{{route('index')}}" class="logo"><img src="{{ asset('/images/logo.svg') }}" alt="Logo" /></a>
            <!-- Поле адреса -->
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

</body>
</html>