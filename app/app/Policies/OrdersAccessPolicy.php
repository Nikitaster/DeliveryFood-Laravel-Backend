<?php

namespace App\Policies;

use App\User;
use App\Orders;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class OrdersAccessPolicy
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
    public static function access(User $user, Orders $order)
    {
        // Администратор
        $is_admin = ($user->account->role->name == 'admin') ? true : false;
        // Менеджер текущего ресторана
        $managers = $order->restaurant->managers;
        $is_manager = false;
        foreach ($managers as $key => $manager) {
            if ($manager->account->user->id === $user->id) {
                $is_manager = true;
                break;
            }
        }

        // Курьер этого заказа
        $is_courier = false;
        if($order->courier) {
            $is_courier = ($order->courier->user->id == $user->id) ? true : false;
        }

        // Клиент, оформивший заказ
        $is_client = false;
        if ($order->client) {
            $is_client = ($order->client->user->id == $user->id) ? true : false;
        }
        return ($is_admin || $is_manager || $is_courier || $is_client);
    }
}
