<?php

declare(strict_types=1);

namespace AxySol\Wallet\Tests\Infra;

use Illuminate\Support\ServiceProvider;

class TestServiceProvider extends ServiceProvider {
  
  public function boot()
  {
    $this->loadMigrationsFrom(dirname(__DIR__).'/migrations');
  }

}