<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    public function accounts()
    {
        return $this->hasMany('App\Accounts', 'role_id');
    }
}
