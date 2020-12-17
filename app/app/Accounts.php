<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public function role()
    {
        return $this->belongsTo('App\Roles', 'role_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function rates()
    {
        return $this->hasMany('App\Rate', 'author_id', 'id');
    }

    public function own_orders()
    {
        return $this->hasMany('App\Orders', 'client_id', 'id');
    }

    public function courier_orders()
    {
        return $this->hasMany('App\Orders', 'courier_id', 'id');
    }
}
