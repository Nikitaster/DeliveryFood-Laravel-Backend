<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
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
