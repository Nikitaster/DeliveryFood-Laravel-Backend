<?php

namespace App\Http\Controllers;

use App\Orders;
use App\Statuses;
use App\OrdersOnQueue;
use App\Restaurants;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orders_on_queue = OrdersOnQueue::find($request->input('order_on_queue'));
        $params = $request->only('fio', 'tel', 'email', 'address');
        $params['goods'] = $orders_on_queue->goods;
        $params['restaurant_id'] = Restaurants::find($orders_on_queue->restaurant_id)->id;
        $params['status_id'] = Statuses::where('name', '=', 'Подтвержден')->first()->id;

        $order = Orders::create($params);

        // TODO: send email 

        return redirect(route('orders.show', $order->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(Orders $order)
    {
        echo "тут будет страничка с инфомрацией по заказу"
        dd($order);
        return '';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(Orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(Orders $orders)
    {
        //
    }
}
