<?php

namespace Apvalkov\LaravelOpenexchangerates;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $configPath = __DIR__ . '/../config/openexchangerates.php';

        $this->mergeConfigFrom($configPath, 'openexchangerates');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->publishes([__DIR__ . '/../config/openexchangerates.php' => config_path('openexchangerates.php')]);
    }
}
