<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\User;
use App\Goods;
use App\Images;
use App\Accounts;
use App\Restaurants;

use App\Http\Requests\GoodsRequest;
use App\Http\Requests\GoodsEditRequest;

class GoodsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($this->is_own_manager(Restaurants::where('name', '=', $request->input('restaurant'))->first()->managers))
        {
            if ($request->has('restaurant')) {
                return view ('goods.create', ['restaurant' => $request->input('restaurant')]);
            }
            else {
                abort('404');
            }
        }
        else {
            abort('403');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsRequest $request)
    {
        if ($this->is_own_manager(Restaurants::where('name', '=', $request->input('restaurant'))->first()->managers))
        {
            try {
                // Создать картинку
                $image = Storage::disk('scaleway')->put('goods', $request->file('image'));
                $url = 'https://ngudkov.s3.nl-ams.scw.cloud/' . $image;
                $image_record = Images::create([
                    'path' => $url,
                ]);
                
                if(!$image_record) {
                    abort(500, 'Ошибка при создании ресторана!');
                }
                
                

                // Создать товар
                $params = $request->only('name', 'description', 'price');
                $params['restaurant_id'] = (string)Auth::user()->account->manager->restaurant->id;
                $params['image_id'] = (string)$image_record->id;
                
                Goods::create($params);
                
                return redirect(route('restaurant', $request->input('restaurant')));

            } catch (Exception $e) {
                abort('500');
            }
        }
        else {
            abort('403');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Goods $good, Request $request)
    {
        if ($this->is_own_manager($good->restaurant->managers))
        {
            return view('goods.edit', ['good' => $good]);
        }
        else {
            abort('403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsEditRequest $request, Goods $good)
    {
        if ($this->is_own_manager($good->restaurant->managers))
        {
            $params = $request->only('name', 'description', 'price');
            $params['restaurant_id'] = $good->restaurant->id;
            
            if ($request->file()) {
                $image = Storage::disk('scaleway')->put('goods', $request->file('image'));
                $url = 'https://ngudkov.s3.nl-ams.scw.cloud/' . $image;
                $image_record = Images::create([
                    'path' => $url,
                ]);
                
                if(!$image_record) {
                    abort(500, 'Ошибка при создании ресторана!');
                }

                $params['image_id'] = $image_record->id;
            }

            $good->update($params);
            return redirect(route('restaurant', $good->restaurant->name));
        }
        else {
            abort('403');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Goods $good, Request $request)
    {
        if ($this->is_own_manager($good->restaurant->managers))
        {
            try{
                $restaurant = $good->restaurant;
                $good->delete();
                return redirect(route('restaurant', $restaurant->name));
            } catch (Exception $e) {
                abort('500');
            }
        }
        else {
            abort('403');
        }
    }


    private function is_own_manager($managers) {
        
        foreach ($managers as $manager) {
            if ($manager->id == Auth::user()->account->manager->id)
            {
                return True;
            }
        }
        return False;
    }
}
