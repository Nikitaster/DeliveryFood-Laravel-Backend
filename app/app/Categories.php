<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function restaurants()
    {
        return $this->hasMany('App\Restaurants', 'category_id', 'id');
    }
}
