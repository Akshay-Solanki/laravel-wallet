<?php

namespace Axy\Wallet;

use Illuminate\Support\ServiceProvider;

class WalletServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
      $this->mergeConfigFrom(
        __DIR__.'/../config/axy_wallet.php', 'axy_wallet'
      );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/axy_wallet.php' => config_path('axy_wallet.php'),
        ]);

        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
