<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    public function image()
    {
        return $this->belongsTo('App\Images', 'user_id', 'id');
    }
}
