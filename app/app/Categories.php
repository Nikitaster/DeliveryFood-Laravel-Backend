<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $fillable = [
        'name',
    ];

    public $timestamps = false;

    public function restaurants()
    {
        return $this->hasMany('App\Restaurants', 'category_id', 'id');
    }
}
