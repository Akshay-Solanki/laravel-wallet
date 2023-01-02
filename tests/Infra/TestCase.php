<?php

namespace Axy\Wallet\Tests\Infra;

use Axy\Wallet\WalletServiceProvider;
use function Orchestra\Testbench\artisan;
use Illuminate\Foundation\Testing\RefreshDatabase;


class TestCase extends \Orchestra\Testbench\TestCase
{
  use RefreshDatabase;

	protected $loadEnvironmentVariables = true;
  public function setUp(): void
  {
    parent::setUp();
    // additional setup
  }

  protected function getPackageProviders($app)
  {
    return [
      WalletServiceProvider::class,
      TestServiceProvider::class
    ];
  }

  protected function getEnvironmentSetUp($app)
  {
    // Setup default database to use sqlite :memory:
    $app['config']->set('database.default', 'testbench');
    $app['config']->set('database.connections.testbench', [
        'driver'   => 'sqlite',
        'database' => ':memory:',
        'prefix'   => '',
    ]);
  }

  /**
   * Define database migrations.
   *
   * @return void
   */
  protected function defineDatabaseMigrations()
  {
      artisan($this, 'migrate', ['--database' => 'testbench']);

      $this->beforeApplicationDestroyed(
          fn () => artisan($this, 'migrate:rollback', ['--database' => 'testbench'])
      );
  }

}