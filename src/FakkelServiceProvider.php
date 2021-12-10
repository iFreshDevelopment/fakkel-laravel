<?php

namespace Ifresh\FakkelLaravel;

use Illuminate\Support\ServiceProvider;

class FakkelServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/fakkel.php' => config_path('fakkel.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('fakkel', function ($app) {
            return new Fakkel();
        });
    }
}
