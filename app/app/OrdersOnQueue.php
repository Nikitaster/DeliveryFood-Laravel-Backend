<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersOnQueue extends Model
{
    protected $table = 'orders_on_queue';

    protected $fillable = [
        'goods', 'restaurant_id',
    ];
}
