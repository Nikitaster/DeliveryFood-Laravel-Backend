<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Managers extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'account_id', 'restaurant_id'
    ];

    public $timestamps = false;

    public function account()
    {
        return $this->hasOne('App\Accounts', 'id', 'account_id');
    }   

    public function restaurant()
    {
        return $this->hasOne('App\Restaurants', 'id', 'restaurant_id');
    }   
}
