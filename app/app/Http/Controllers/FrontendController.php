<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Restaurants;
use App\Goods;

class FrontendController extends Controller
{
    public function restaurants_list(Request $request) 
    {
        if ($request->has('name')) {
            $search = $request['name'];
            return view('frontend.index', ['restaurants' => Restaurants::where('name', 'like', '%' . $search . '%')
                ->paginate(6)
                ->appends(request()->query()), 'name' => $search]);
        }
        return view('frontend.index', ['restaurants' => Restaurants::paginate(6)
            ->appends(request()
            ->query()), 'name' => NULL]);   
    }

    public function restaurant($restaurant)
    {
        $restaurant = Restaurants::where('name', '=', $restaurant)->first();
        $goods = Goods::where('restaurant_id', '=', $restaurant->id)->paginate(6);

        return view('frontend.restaurant', [
            'restaurant' =>  $restaurant,
            'goods' =>  $goods,
        ]);
    }

    public function create_order(Request $request) {
        return redirect(route('order_confirmation', ['order_info' => $request->input()]));
    }

    public function order_confirmation(Request $request) {
        // dd($request);
        return '<h1>ТУТ БУДЕТ СТРАНИЧКА ПОДТВЕРЖДЕНИЯ ЗАКАЗА!!! ВИДАЛИ, КАК МОГУ?!!!</h1><br>' . json_encode($request->input());
    }
}
