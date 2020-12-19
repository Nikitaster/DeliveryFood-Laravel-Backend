@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mb-5">Менеджер "{{$manager->account->user->name}}"</h1>



        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $manager->account->user->name }}" required autocomplete="name" autofocus placeholder="login" disabled>
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $manager->account->user->email }}" required autocomplete="email" placeholder="test@mail.ru" disabled>
            </div>
        </div>

        <div class="form-group row">
            <span for="email" class="col-md-4  text-md-right">Ресторан</span>
            <span class="col-md-6">
                <a href="{{ route('restaurants.show', $manager->restaurant->id) }}">{{ $manager->restaurant->name }}</a>
            </span>
        </div>
    

        <div class="col-md-6 offset-md-4" style="display: flex; flex-direction: row; justify-content: flex-start;"> 
        
            <form method="GET" action="{{ route('restaurants.index') }}">
                <button type="submit" class="btn btn-primary ">  
                    К ресторанам
                </button>
            </form>


            <form method="POST" action="{{ route('managers.destroy', $manager->id) }}">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="DELETE">
                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                    </div>
                </div>   
            </form>  
        </div>
    
</div>
@endsection