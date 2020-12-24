@extends('layouts.app')

@section('extra_static')
<script src="{{ asset('js/home.js') }}" defer></script>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if(Auth::user()->account->role->name == 'manager')
                    <div class="card-header">Личный кабинет Менеджера</div>
                @elseif(Auth::user()->account->role->name == 'admin')
                    <div class="card-header">Личный кабинет Администратора</div>
                @elseif(Auth::user()->account->role->name == 'courier')
                    <div class="card-header">Личный кабинет Курьера</div>
                @else
                    <div class="card-header">Личный кабинет Пользователя</div>
                @endif

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Контактные данные
                                </button>
                            </h2>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body">
                                <form method="POST" action="{{route('accounts_update', Auth::user()->account->id)}}">
                                    {{ csrf_field() }}
                                    
                                    <label>ФИО:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control person-info-input @error('FIO') is-invalid @enderror" placeholder="Фамилия имя Отчество" name="FIO" value="{{Auth::user()->account->FIO}}" disabled required>
                                        @error('FIO')
                                            <p class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong> 
                                            </p>
                                        @enderror
                                    </div>

                                    <label>Номер телефона:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control person-info-input @error('phone') is-invalid @enderror" placeholder="+7(123)456-78-90" name="phone" value="{{Auth::user()->account->phone}}" disabled required>
                                        @error('phone')
                                            <p class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong> 
                                            </p>
                                        @enderror
                                    </div>

                                    <label>Адрес доставки:</label>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control person-info-input @error('address') is-invalid @enderror" placeholder="Адрес доставки" name="address" value="{{Auth::user()->account->address}}" disabled required>
                                        @error('address')
                                            <p class="invalid-feedback text-center" role="alert">
                                                <strong>{{ $message }}</strong> 
                                            </p>
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button class="btn btn-secondary" type="button" id="changePersonInfoButton">Изменить</button>
                                        <button class="btn btn-primary d-none" type="submit" id="changePersonInfoSubmit">Сохранить</button>
                                    </div>

                                </form>
                            </div>
                            </div>
                        </div>
                        @if(Auth::user()->account->role->name == 'admin')
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Панель администратора
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="{{route('restaurants.index')}}" class="list-group-item list-group-item-action">Рестораны</a>
                                            <a href="{{route('categories.index')}}" class="list-group-item list-group-item-action">Категории ресторанов</a>
                                            <a href="{{route('couriers.index')}}" class="list-group-item list-group-item-action">Курьеры</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @elseif(Auth::user()->account->role->name == 'courier')
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Панель курьера
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="" class="list-group-item list-group-item-action">Открытые заказы</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif(Auth::user()->account->role->name == 'manager')
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Панель менеджера
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="list-group">
                                            <a href="{{route('restaurant', Auth::user()->account->manager->restaurant->name)}}" class="list-group-item list-group-item-action">Ресторан "{{Auth::user()->account->manager->restaurant->name}}"</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                История заказов
                                </button>
                            </h2>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body" style="overflow-x: auto">
                                    <table class="table text-center">
                                        <thead>
                                            <tr>
                                            <th scope="col">Заказ №</th>
                                            <th scope="col">На сумму</th>
                                            <th scope="col">Статус</th>
                                            <th scope="col">Дата</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach(Auth::user()->account->own_orders as $order)
                                                <tr> 
                                                <th scope="row"><a href="{{route('orders.show', $order->id)}}">{{$order->id}}</a></th>
                                                <td>{{$order->total}} ₽</td>
                                                <td>{{$order->status->name}}</td>
                                                <td>{{$order->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
