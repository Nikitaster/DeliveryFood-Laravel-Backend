<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    public function image()
    {
        return $this->belongsTo('App\Images', 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Categories', 'category_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany('App\Rate', 'restaurant_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany('App\Orders', 'restaurant_id', 'id');
    }
}
