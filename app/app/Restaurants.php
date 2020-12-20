<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurants extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'address', 'image_id', 'category_id',
    ];

    public function image()
    {
        return $this->belongsTo('App\Images', 'image_id', 'id');
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

    public function managers()
    {
        return $this->hasMany('App\Managers', 'restaurant_id', 'id');
    }
}
