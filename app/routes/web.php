<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('restaurants', 'RestaurantsController')->middleware('can:access,App\Restaurants');

Route::resource('goods', 'GoodsController')->middleware('can:access,App\Goods');

Route::resource('managers', 'ManagersController', ['only' => 
        ['create', 'show', 'store', 'destroy']])
        ->middleware('can:access,App\Restaurants');

Route::resource('categories', 'CategoriesController', ['only' => 
        ['index', 'create', 'store', 'destroy']])
        ->middleware('can:access,App\Restaurants');

Route::resource('couriers', 'CouriersController', ['only' => 
        ['index', 'create', 'store', 'destroy']])
        ->middleware('can:access,App\Restaurants');

Route::get('/', 'FrontendController@restaurants_list')->name('index');
Route::get('/restaurant/{restaurant}', 'FrontendController@restaurant')->name('restaurant');

Route::post('/create-order', 'FrontendController@create_order');
Route::get('/order-confirmation', 'FrontendController@order_confirmation')->name('order_confirmation');
Route::get('/order-cancel/{id}', 'FrontendController@order_cancel')->name('order_cancel');

Route::resource('orders', 'OrdersController', ['only' => 
['show', 'store', 'destroy']]);

Route::post('/accounts/{id}', 'AccountController@update')->name('accounts_update');