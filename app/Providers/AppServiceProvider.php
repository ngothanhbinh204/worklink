<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->mapApiRoutes();

        Passport::enablePasswordGrant();
        if (class_exists(Passport::class)) {
            // Passport::routes();
        }

    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));
    }
}