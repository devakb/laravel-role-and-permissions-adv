<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('config', function ($expression) {
            return "<?= config($expression); ?>";
        });

        Blade::directive('old', function ($arguments) {
            $arguments = str_replace('"', "'", $arguments);
            return "<?= old($arguments); ?>";
        });

        Blade::if('RouteIf', function ($route_name) {
            return request()->routeIs($route_name);
        });
    }
}
