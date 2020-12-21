<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image_id', 'price', 'restaurant_id',
    ];

    public function image()
    {
        return $this->belongsTo('App\Images', 'image_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurants', 'restaurant_id', 'id');
    }
}
