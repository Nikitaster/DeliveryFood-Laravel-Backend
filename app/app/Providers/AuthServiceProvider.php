<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\OrdersAccessPolicy;
use App\Policies\OrdersListAccessPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        'App\Restaurants' => 'App\Policies\RestaurantsPolicy',
        'App\Goods' => 'App\Policies\ManagersPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('order-access', [OrdersAccessPolicy::class, 'access']);
        Gate::define('order-list-access', [OrdersListAccessPolicy::class, 'access']);
    }
}
