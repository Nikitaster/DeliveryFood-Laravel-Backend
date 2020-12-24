<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RateTokens extends Model
{
    protected $table = 'rate_tokens';

    protected $fillable = [
        'token', 'restaurant_id',
    ];

    public function restaurant()
    {
        return $this->hasOne('App\Restaurants', 'id', 'restaurant_id');
    }
}
