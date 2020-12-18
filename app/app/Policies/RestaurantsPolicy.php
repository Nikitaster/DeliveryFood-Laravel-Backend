<?php

namespace App\Policies;

use App\User;
use App\Roles;
use App\Accounts;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantsPolicy
{
    use HandlesAuthorization;
    
    /**
     * Determine whether the user can view any restaurants.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function access(User $user)
    {
        $role_id = Accounts::where('user_id', '=', (string)$user->id)->first()->role_id;
        return $role_id === Roles::where('name', '=', 'admin')->first()->id;
    }
}