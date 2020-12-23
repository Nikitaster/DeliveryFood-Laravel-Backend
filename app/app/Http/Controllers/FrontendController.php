<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Restaurants;
use App\Goods;
use App\OrdersOnQueue;
use App\Accounts;

class FrontendController extends Controller
{
    public function restaurants_list(Request $request) 
    {
        if ($request->has('name')) {
            $search = $request['name'];
            return view('frontend.index', ['restaurants' => Restaurants::where('name_lower', 'like', '%' . strtolower($search) . '%')
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
        try {
            $order_input = $request->input('order_info');
            $restaurant = NULL;
            if (!$order_input) {
                abort('500');
            }

            $restaurant_input = NULL;
            $goods_input = [];
            $goods = [];
            $total = 0;
            $address = (Auth::check())?Auth::user()->account->address:'';

            foreach ($order_input as $key => $value) {
                if (array_key_exists('restaurant', $value)) {
                    $restaurant_input = $value['restaurant'];
                }
                if (array_key_exists('address', $value)) {
                    $address = $value['address'];
                }
                if (array_key_exists('goods', $value)) {
                    $goods_input = $value['goods'];
                }
            }

            $restaurant = Restaurants::where('name', '=', $restaurant_input)->first();
            
            foreach ($goods_input as $key => $order_good) {
                $added = false;
                foreach ($restaurant->goods as $rest_key => $good) {
                    if ($good->name == $order_good['name']) {
                        array_push($goods, [$good, (int)$order_good['amount']]);
                        $total += (int)$order_good['amount'] * $good->price;
                        $added = true;
                        break;
                    }
                }
                if (!$added) {
                    abort('500');
                }
            }

            $order = OrdersOnQueue::create([
                'goods' => json_encode($goods),
                'restaurant_id' => $restaurant->id,
            ]);

            return view('frontend.order_confirmation', [
                'goods' => $goods,
                'restaurant' => $restaurant,
                'address' => $address,
                'total' => $total,
                'order' => $order,
            ]);

        } catch (Exception $e) {
            abort('500');
        }

    }

    public function order_cancel($id) {
        $obj = OrdersOnQueue::find($id);
        if ($obj)
            $obj->delete();
        return redirect('/');
    }
}
