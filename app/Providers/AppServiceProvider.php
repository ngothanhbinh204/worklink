<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use App\Repositories\Contracts\BaseRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Eloquent\UserRepository;
use App\Services\Contracts\UserServiceInterface;
use App\Services\UserServices;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */

    public function register(){
        $repositories = [
            BaseRepositoryInterface::class => BaseRepository::class,
            UserRepositoryInterface::class => UserRepository::class,
        ];

        $services = [
            UserServiceInterface::class => UserServices::class,
        ];


        foreach ($repositories as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        };

        foreach ($services as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        };
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