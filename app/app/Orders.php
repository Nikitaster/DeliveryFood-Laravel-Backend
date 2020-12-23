<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'restaurant_id', 'status_id', 'courier_id', 'goods',
        'FIO', 'tel', 'email', 'address',
    ];

    public function status()
    {
        return $this->belongsTo('App\Statuses', 'status_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo('App\Accounts', 'client_id', 'id');
    }

    public function courier()
    {
        return $this->belongsTo('App\Accounts', 'courier_id', 'id');
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Restaurants', 'restaurant_id', 'id');
    }
}
