<?php

namespace AxySol\Wallet;

use AxySol\Wallet\Services\CastService;
use AxySol\Wallet\Services\MathService;
use AxySol\Wallet\Services\WalletService;
use Illuminate\Support\ServiceProvider;
use AxySol\Wallet\Services\CastServiceInterface;
use AxySol\Wallet\Services\MathServiceInterface;
use AxySol\Wallet\Services\WalletServiceInterface;

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
        $this->app->singleton(MathServiceInterface::class,MathService::class);
        $this->app->singleton(WalletServiceInterface::class,WalletService::class);
        $this->app->singleton(CastServiceInterface::class,CastService::class);
    }
}
