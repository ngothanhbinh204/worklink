<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Policies\UserPolicy;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected $policies = [
        User::class => UserPolicy::class,
    ];


    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Passport::routes();

        // ROLE
        Gate::define('admin', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('user', function (User $user) {
            return $user->role === 'user';
        });

        // PERMISSION


    }
}
