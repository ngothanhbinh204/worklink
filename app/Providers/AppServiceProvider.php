<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Passport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // Đăng ký binding cho repositories
        $this->registerRepositories();

        // Đăng ký binding cho services
        $this->registerServices();
    }

    /**
     * Đăng ký binding cho repositories.
     */
    protected function registerRepositories()
    {
        $repositoryPath = app_path('Repositories');
        $contractsPath = $repositoryPath . '/Contracts';
        $eloquentPath = $repositoryPath . '/Eloquent';

        // Quét thư mục Contracts để lấy danh sách interfaces
        $contracts = glob($contractsPath . '/*Interface.php');

        foreach ($contracts as $contract) {
            $interface = 'App\\Repositories\\Contracts\\' . basename($contract, '.php');
            $implementation = 'App\\Repositories\\Eloquent\\' . str_replace('Interface', '', basename($contract, '.php'));

            // Kiểm tra xem interface và implementation có tồn tại không
            if (interface_exists($interface) && class_exists($implementation)) {
                $this->app->bind($interface, $implementation);
            }
        }
    }

    /**
     * Đăng ký binding cho services.
     */
    protected function registerServices()
    {
        $servicePath = app_path('Services');
        $contractsPath = $servicePath . '/Contracts';
        $eloquentPath = $servicePath . '/Eloquent';

        // Quét thư mục Contracts để lấy danh sách interfaces
        $contracts = glob($contractsPath . '/*Interface.php');

        foreach ($contracts as $contract) {
            $interface = 'App\\Services\\Contracts\\' . basename($contract, '.php');
            $implementation = 'App\\Services\\Eloquent\\' . str_replace('Interface', '', basename($contract, '.php'));

            // Kiểm tra xem interface và implementation có tồn tại không
            if (interface_exists($interface) && class_exists($implementation)) {
                $this->app->bind($interface, $implementation);
            }
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // Log các truy vấn SQL
        DB::listen(function ($query) {
            Log::info($query->sql, $query->bindings, $query->time);
        });

        // Đăng ký routes API
        $this->mapApiRoutes();

        // Bật tính năng Password Grant của Passport
        Passport::enablePasswordGrant();

        // Đăng ký routes của Passport (nếu cần)
        if (class_exists(Passport::class)) {
            // Passport::routes();
        }
    }

    /**
     * Đăng ký routes API.
     */
    protected function mapApiRoutes()
    {
        Route::middleware('api')->prefix('api')->group(base_path('routes/api.php'));
    }
}