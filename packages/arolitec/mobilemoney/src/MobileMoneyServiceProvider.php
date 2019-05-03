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
        $this->app->make(MobileMoneyController::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/mobilemoney.php' => config_path('mobilemoney.php'),
        ]);
    }
}
