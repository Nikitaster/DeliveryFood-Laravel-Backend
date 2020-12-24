<?php

namespace App\Http\Controllers;

use App\Orders;
use App\RateTokens;
use App\Statuses;
use App\OrdersOnQueue;
use App\Restaurants;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderCreateMail;
use App\Mail\OrderCompleteMail;

use Illuminate\Support\Facades\Gate;

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
        $params['total'] = $orders_on_queue->total;
        $params['restaurant_id'] = Restaurants::find($orders_on_queue->restaurant_id)->id;
        $params['status_id'] = Statuses::where('name', '=', 'Подтвержден')->first()->id;

        if (Auth::check()) {
            $params['client_id'] = Auth::user()->account->id;
        }

        $order = Orders::create($params);

        // send email 
        Mail::to($params['email'], $params['fio'])->send(new OrderCreateMail($order));

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
        if (! Gate::forUser(Auth::user())->allows('order-access', $order)) {
            abort(403);
        }

        return view('orders.show', ['order' => $order]);
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
    public function destroy(Orders $order)
    {
        //
    }

    public function complete(Orders $order)
    {
        if (! Gate::forUser(Auth::user())->allows('order-access', $order)) {
            abort(403);
        }
        $order->update([
            'status_id' => Statuses::all()->last()->id,
        ]);
        $order->save();
        
        // email
        $rate_token = hash('ripemd160', rand());
        RateTokens::create([
            'token' => $rate_token,
            'restaurant_id' => $order->restaurant->id,
        ]);
        Mail::to($order->email, $order->fio)->send(new OrderCompleteMail($order, $rate_token));

        return '<p>Заказ #' . $order->id . ' завершен!</p><br><a href="' . route('home') . '">К панели</a>';
    }
}
