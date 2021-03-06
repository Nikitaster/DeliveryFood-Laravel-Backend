<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
    ];

    public function good()
    {
        return $this->hasOne('App\Goods', 'image_id', 'id');
    }

    public function restaurant()
    {
        return $this->hasOne('App\Restaurants', 'image_id', 'id');
    }
}
