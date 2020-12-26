<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Restaurants;
use App\Images;
use App\Categories;

use App\Http\Requests\RestaurantRequest;
use App\Http\Requests\RestaurantEditRequest;

use Illuminate\Support\Facades\Storage;

class RestaurantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('restaurants.index', ['restaurants' => Restaurants::orderBy('id', 'asc')->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();
        return view('restaurants.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantRequest $request)
    {
        $category_name = (string)$request->input('category');

        // Создать картинку
        $image = Storage::disk('scaleway')->put('restaurants', $request->file('image'));
        $url = 'https://ngudkov.s3.nl-ams.scw.cloud/' . $image;
        $image_record = Images::create([
            'path' => $url,
        ]);
        
        if(!$image_record) {
            abort(500, 'Ошибка при создании ресторана!');
        }

        // Создать ресторан
        $rest_record = Restaurants::create([
            'name' => $request->input('name'),
            'name_lower' => mb_strtolower($request->input('name')),
            'address' => $request->input('address'),
            'image_id' => (string)$image_record->id,
            'category_id' => (string)Categories::where('name', '=', $category_name)->first()->id,
        ]);

        // TODO: Редирект на создание менеджера
        return redirect(route('restaurants.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurants $restaurant)
    {
        return view('restaurants.show', ['restaurant' => $restaurant]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurants $restaurant)
    {
        return view('restaurants.update', ['restaurant' => $restaurant, 'categories' => $categories = Categories::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantEditRequest $request, Restaurants $restaurant)
    {
        $params = $request->only('name', 'address', 'category');
        $params['name_lower'] = mb_strtolower($request->input('name'));
        $params['category'] = (string)Categories::where('name', '=', $params['category'])->first()->id;
        
        if ($request->file()) {
            $image = Storage::disk('scaleway')->put('restaurants', $request->file('image'));
            $url = 'https://ngudkov.s3.nl-ams.scw.cloud/' . $image;
            $image_record = Images::create([
                'path' => $url,
            ]);
            
            if(!$image_record) {
                abort(500, 'Ошибка при создании ресторана!');
            }

            $params['image_id'] = $image_record->id;
        }

        $restaurant->update($params);
        return redirect(route('restaurants.show', $restaurant->id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurants $restaurant)
    {
        $restaurant->delete();
        return redirect(route('restaurants.index'));
    }
}
