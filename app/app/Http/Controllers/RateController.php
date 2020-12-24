<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurants;
use App\RateTokens;
use App\Rate;
use App\Http\Requests\RateRequest;
use Illuminate\Support\Facades\Auth;

class RateController extends Controller
{
    public function show($token) {
        try {
            $restaurant = RateTokens::where('token', '=', $token);
            if (!$restaurant->get()->isEmpty()) {
                return view('rates.show', ['restaurant' => $restaurant->first()->restaurant, 'token' => $token]);
            } else {
                return redirect(route('index'));
            }


        } catch (Exception $e) {
            abort('500');
        }
    }

    public function store(RateRequest $request)
    {
        try {
            $params = $request->only('rate');
            $rate_token = RateTokens::where('token', '=', $request->input('token'));
            if ($rate_token->get()->isEmpty()) {
                abort('404');
            }
            $rate_token = $rate_token->first();
            $restaurant = $rate_token->restaurant;
            $params['restaurant_id'] = $restaurant->id;
            if (Auth::check()) {
                $params['author_id'] = Auth::user()->account->id;
            }
            Rate::create($params);
            $rate_token->delete();
            return '<h2>Спасибо за оценку!</h2>';

        } catch (Exception $e) {
            abort('500');
        }
    }
}
