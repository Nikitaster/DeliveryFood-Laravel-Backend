<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurants;

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
        return view('frontend.restaurant', ['restaurant' => Restaurants::where('name', '=', $restaurant)->first() ]);
    }
}
