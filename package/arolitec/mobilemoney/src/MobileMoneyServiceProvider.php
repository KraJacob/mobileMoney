<?php

namespace Arolitec\Mobilemoney;

use Illuminate\Support\ServiceProvider;

class MobileMoneyServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('arolitec\mobilemoney\MobileMoneyController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/migrations');
    }
}
