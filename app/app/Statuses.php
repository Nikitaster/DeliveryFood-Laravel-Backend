<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statuses extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Orders', 'status_id', 'id');
    }
}
