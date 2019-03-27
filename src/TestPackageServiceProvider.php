<?php

namespace Leshgan\testLaravelPackage;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class TestPackageServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->register('Leshgans\TestLaravelPackage\TestProductAuthServiceProvider');
        $this->app->make('Leshgan\testLaravelPackage\ProductController');
        $this->app->bind('current_user_type', function () {
            return 'admin';
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    // public function boot(AuthRegistar $registar)
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->loadViewsFrom(__DIR__.'/views', 'testLaravelPackage');
        $this->publishes([
            __DIR__.'/views' => resource_path('views/vendor/testLaravelPackage'),
            __DIR__.'/migrations' => base_path('database/migrations'),
        ]);
    }
}
