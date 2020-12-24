<?php

namespace App\Policies;

use App\User;
use App\Orders;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrdersListAccessPolicy
{
    use HandlesAuthorization;


    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        // 
    }

    /**
     * Determine whether the user can view any restaurants.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public static function access(User $user)
    {
        // Администратор
        $is_admin = ($user->account->role->name == 'admin') ? true : false;

        // Курьер
        $is_courier = ($user->account->role->name == 'courier') ? true : false;
        
        return ($is_admin || $is_courier);
    }
}
