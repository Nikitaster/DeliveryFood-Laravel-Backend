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
    <style>
        * {
    box-sizing: border-box;
}

body {
    font-family: 'Roboto', sans-serif;
    font-weight: 400;
    padding-top: 44px;
}

img {
    vertical-align: unset!important;
}

a {
    text-decoration: none;
}

/* Header */

.container {
    max-width: 1200px;
    margin: auto;
}

.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 40px;
}

.input {
    background: #FFFFFF;
    border: 1px solid #D9D9D9;
    border-radius: 2px;
    font-size: 16px;
    line-height: 24px;
    padding: 8px;
    padding-left: 35px;
    background-repeat: no-repeat;
    background-position: left 11px center;
}

.input-address {
    flex: 0.8;
    background-image: url(/images/home.svg);
}

.input-address-delivery {
    flex: 0.8;
    background-image: url(/images/house.svg);
}

.input-fio {
    flex: 0.8;
    background-image: url(/images/person.svg);
}

.input-phone {
    flex: 0.8;
    background-image: url(/images/telephone.svg);
}

.input-email {
    flex: 0.8;
    background-image: url(/images/envelope.svg);
}

.buttons {
    display: flex;
    align-items: center;
}

.button {
    display: flex;
    align-items: center;
    padding: 8px 16px;
    background: #FFFFFF;
    border: 1px solid #D9D9D9;
    box-sizing: border-box;
    box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.0015);
    border-radius: 2px;
    font-size: 16px;
    line-height: 24px;
    vertical-align: middle;
}

.button-primary {
    background: #1890FF;
    border: 1px solid #1890FF;
    color: #fff;
    margin-right: 10px;
}

.button-icon {
    margin-right: 6px;
}

.button-card-text {
    margin-right: 10px;
}



/* Section Promo */
.promo {
    filter: drop-shadow(0px 7px 12px rgba(158, 158, 163, 0.1));
    background: #FFF1B8 url(/images/promo-image.png) no-repeat top -150px right -200px / 800px;  /* / ширина */
    border-radius: 10px;
    padding: 68px 590px 69px 70px;
    margin-bottom: 56px;
}

.promo-text {
    max-width: 538px;
    font-style: normal;
    font-weight: normal;
    font-size: 24px;
    line-height: 28px;
}

.promo-title {
    font-style: normal;
    font-weight: bold;
    font-size: 39px;
    line-height: 46px;
}

.section-heading {
    display: flex;
    align-items: center;
    margin-bottom: 44px;
}

.section-title {
    font-style: normal;
    font-weight: bold;
    font-size: 36px;
    line-height: 42px;
    margin-right: 30px;
}

.input-search {
    width: 300px;
    background-image: url(/images/search.svg);
    margin-left: auto;
}

.cards {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    align-items: flex-start;
}

.card {
    background: #FFFFFF;
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.05);
    border-radius: 7px;
    overflow: hidden; /* скругляет все, что за карточкой*/
    margin-bottom: 30px;
    flex-basis: 31%;
    text-decoration: none;

    display: flex;
    flex-direction: column;
}

.card-image {
    align-self: center;
    width: 384px;
    height: 250px;
    object-fit: cover;
}

.card-text {
    padding: 20px 23px 35px 23px;
}

.card-heading {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.card-title {
    margin: 0;
    font-style: normal;
    font-weight: bold;
    font-size: 24px;
    line-height: 32px;
}

.card-title-reg {
    font-weight: 400;
    font-style: normal;
    font-size: 22px;
    line-height: 32px;
}

.card-tag {
    font-style: normal;
    font-weight: normal;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    border-radius: 2px;
    background-color: #000;
    padding: 1px 8px;
}

.card-info {
    display: flex;
    align-items: center;
    flex-wrap: wrap; 
}

.restaurant-card-info {
    display: flex;
    align-items: center;
    flex-wrap: wrap; 
    margin-bottom: 24px;  
}

.card-buttons {
    display: flex;
    align-items: center
}

.card-price-bold {
    font-size: 20px;
    line-height: 32px;
    color: #000;
    margin-left: 30px;
}

.rating {
    margin-right: 26px;
    color: rgba(255, 193, 7, 1);
    font-style: normal;
    font-weight: bold;
    font-size: 18px;
    line-height: 32px;
}

.price, .category, .add-position-link {
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 32px;
    color: #8C8C8C;
}

.add-position-link {
    text-decoration: none;
}

.price {
    margin-right: 10px;
}

.category {
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
    max-width: 150px;
}

.ingredients {
    color: #8C8C8C;
    font-size: 18px;
    line-height: 21px;
}

.price:after {
    content: "";
    width: 5px;
    height: 5px;
    background-color: #8C8C8C;
    display: inline-block;
    vertical-align: middle;
    border-radius: 50%;
    margin-left: 10px;
}

.add-position {
    margin-left: auto;
}

main {
    background: linear-gradient(180deg, rgba(245, 245, 245, 0) 1.04%, #F5F5F5 100%);
}

footer {
    padding: 60px 0;
}

.footer-block {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.footer-link {
    display: inline-block;
    color: #595959;
    text-decoration: none;
    font-style: normal;
    font-weight: normal;
    font-size: 18px;
    line-height: 21px;
}

.footer-link:not(:last-child) {
    margin-right: 15px;
}

.footer-nav {
    margin-right: auto;
    margin-left: 35px;
}

.social-links {
    display: flex;
    align-items: center;
}

.social-link:not(:last-child) {
    margin-right: 21px;
}

.modal {
    position: fixed; 
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    display: none;
}

.is-open {
    display: flex;
}

.modal-dialog {
    max-width: 780px;
    width: 95%;
    background: #FFFFFF;
    border-radius: 5px;
    margin: auto;
    padding: 40px 45px;
}

.modal-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 45px;
}

.modal-title {  
    margin: 0;
    font-family: Roboto;
    font-style: normal;
    font-weight: bold;
    font-size: 36px;
    line-height: 42px;
}

.modal-body {
    margin-bottom: 52px;
}

.form-confirmation {
    display: flex; 
    flex-direction: column;
}

.form-confirmation > span {
    margin-bottom: 6px;
}

.form-confirmation > div > input {
    width: 100%;
}

.close {
    font-size: 36px;
    border: none;
    background-color: transparent;
}

.food-row {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    padding-bottom: 8px;
    border-bottom: 1px solid #D9D9D9;
    margin-bottom: 15px;
}

.food-row-order-confirmation {
    align-items: center;
}

.food-name {
    font-weight: normal;
    font-size: 18px;
    line-height: 32px; 
}

.food-price {
    margin-left: auto;
    margin-right: 47px;
    font-weight: bold;
    font-size: 20px;
    line-height: 32px;
}

.food-counter {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.counter-button {
    background: #FFFFFF;
    border: 1px solid #40A9FF;
    box-sizing: border-box;
    border-radius: 2px;
    width: 49px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: normal;
    font-size: 14px;
    line-height: 22px;
    color: #40A9FF;

}

.counter {
    font-style: normal;
    font-weight: normal;
    font-size: 16px;
    line-height: 24px;
    margin: 0px 10px;
}

.modal-footer {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.footer-buttons {
    display: flex;
    justify-content: space-between;
}

.modal-price-tag {
    background: #262626;
    border-radius: 5px;
    color: #FFF;
    padding: 15px 20px;
    font-size: 20px;
    line-height: 23px;
}

.restaurant-search-form{
    margin-left: auto;
}

// pagination

.pagination-container {
    display: flex;
    justify-content: flex-end;
}

.pagination {
    display: flex;
    padding-left: 0;
    list-style: none;
    border-radius: 0.25rem;
  }
  
.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;
    color: #3490dc;
    background-color: #fff;
    border: 1px solid #dee2e6;
    text-decoration: none;
}

.page-link:hover {
    z-index: 2;
    color: #1d68a7;
    text-decoration: none;
    background-color: #e9ecef;
    border-color: #dee2e6;
}

.page-link:focus {
    z-index: 3;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(52, 144, 220, 0.25);
}

.page-item:first-child .page-link {
    margin-left: 0;
    border-top-left-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
}

.page-item:last-child .page-link {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
}

.page-item.active .page-link {
    z-index: 3;
    color: #fff;
    background-color: #3490dc;
    border-color: #3490dc;
}

.page-item.disabled .page-link {
    color: #6c757d;
    pointer-events: none;
    cursor: auto;
    background-color: #fff;
    border-color: #dee2e6;
}

.pagination-lg .page-link {
    padding: 0.75rem 1.5rem;
    font-size: 1.125rem;
    line-height: 1.5;
}

.pagination-lg .page-item:first-child .page-link {
    border-top-left-radius: 0.3rem;
    border-bottom-left-radius: 0.3rem;
}

.pagination-lg .page-item:last-child .page-link {
    border-top-right-radius: 0.3rem;
    border-bottom-right-radius: 0.3rem;
}

.pagination-sm .page-link {
    padding: 0.25rem 0.5rem;
    font-size: 0.7875rem;
    line-height: 1.5;
}

.pagination-sm .page-item:first-child .page-link {
    border-top-left-radius: 0.2rem;
    border-bottom-left-radius: 0.2rem;
}

.pagination-sm .page-item:last-child .page-link {
    border-top-right-radius: 0.2rem;
    border-bottom-right-radius: 0.2rem;
}

/* media */

@media (min-width: 2000px) {
    .container {
        max-width: 1800px;
    }
}

@media (max-width: 1366px) {
    .container {
        max-width: 960px;
    }
    .promo {
        background-size: 750px;
        background-position: center right -300px;
    }
    .rating {
        margin-right: 15px;
    }
    .category, .price {
        font-size: 14px;
    }
}

@media (max-width: 992px) {
    .container {
        max-width: 750px;
    }
    .promo {
        padding: 50px;
        background-size: 500px;
        background-position: center right -200px;
    }
    .promo-text {
        font-size: 18px;
        max-width: 400px;
    }
    .card {
        flex-basis: 49%;
    }
    .footer-link {
        font-size: 16px;
    }
}

@media (max-width: 768px) {
    .container {
        max-width: 560px;
    }
    .card-info {
        flex-wrap: wrap;
    }
    .card .rating {
        flex-basis: 100%;
    }
    .card-title {
        font-size: 18px;
    }
    .promo {
        background-size: 400px;
        background-position: bottom 50px right -200px;
    }
    .promo-title {
        font-size: 24px;
        line-height: 1.4;
    }
    .promo-text {
        margin-top: 0;
    }
}

@media (max-width: 578px) {
    .container {
        width: 90%;
    }
    .header {
        flex-wrap: wrap;
    }
    .input-address {
        order: 5; /* по счету 5*/
        margin-top: 15px;
        flex: 1px; /* растянуть ан всю ширину*/
    }
    .promo {
        background-image: none;
    }
    .promo-title {
        margin-bottom: 10px;
    }
    .section-title {
        font-size: 20px;
    }
    .card {
        flex-basis: 100%;
    }
    .card-image {
        width: 100%;
    }
    .footer-nav {
        margin-left: 0;
        margin-right: 0;
        order: 0;
        flex-direction: column;
    }
    .footer-logo {
        margin-right: 15px;
        order: 1;
    }
    .social-links {
        order: 2;
    }
    .footer-block {
        align-items: flex-start;
        justify-content: space-between;
    }
    .footer {
        padding: 30px 0;
    }
    .food-row {
        display: flex;
        flex-wrap: wrap;
    }
    .food-name {
        flex-basis: 100%;
    }
    .food-price {
        flex-basis: 100%;
    }
    .counter {
        margin: 0;
    }
    .modal-footer {
        flex-wrap: wrap;
    }
    .modal-price-tag {
        flex-basis: 100%;
        margin-bottom: 12px;
        text-align: center;
    }
}

@media (max-width: 480px) {
    .footer-block {
        flex-wrap: wrap;
        flex-direction: column;
        align-items: center;
    }
    .footer-logo {
        order: 0;
        margin-bottom: 20px;
    }
    .footer-nav {
        margin-bottom: 20px;
        text-align: center;
    }
    .footer-link:not(:last-child) {
        margin-right: 0;
    }
    .section-heading {
        flex-wrap: wrap;
    }
    .promo {
        padding: 20px;
    }
    .button-text {
        display: none;
    }
    .button {
        min-height: 40px;
    }
    .button-icon {
        margin: 0;
    }
    .footer-buttons {
        flex-wrap: wrap;
    }
    .footer-buttons > .button:not(:last-child) {
        margin-bottom: 12px;
    }
}
    </style>
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