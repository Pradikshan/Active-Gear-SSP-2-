<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        User::class => UserPolicy::class,
        // 'App\Models\User' => 'App\Policies\UserPolicy',
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('admin-access', [UserPolicy::class, 'adminAccess']);
        Gate::define('manager-access', [UserPolicy::class, 'managerAccess']);
        Gate::define('inventory-access', [UserPolicy::class, 'inventoryAccess']);
        Gate::define('customer-access', [UserPolicy::class, 'customerAccess']);
    }
}
