<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $table = 'rate';
    
    protected $fillable = [
        'rate', 'restaurant_id', 'author_id',
    ];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurants', 'restaurant_id', 'id');
    }
}
