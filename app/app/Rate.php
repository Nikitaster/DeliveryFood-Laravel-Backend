<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurants', 'restaurant_id', 'id');
    }
}
