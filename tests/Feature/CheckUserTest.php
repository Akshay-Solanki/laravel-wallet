<?php
declare(strict_types=1);

namespace Axy\Wallet\Tests\Feature;

use Axy\Wallet\Tests\Infra\TestCase;
use Axy\Wallet\Tests\Infra\Factories\UserFactory;


class CheckUserTest extends TestCase{

  /** @test */
  public function test_user_can_login()
  {
    $user = UserFactory::new()->create();

    $this->assertDatabaseCount('users', 1);
  }

  /** @test */
  public function test_user_can_check_balance()
  {
    $user = UserFactory::new()->create();

    $this->assertEquals($user->balance, 0);
  }

  /** @test */
  public function test_user_can_credit_balance()
  {
    $user = UserFactory::new()->create();
    $user->credit(50);
    $this->assertEquals($user->balance, 50);
  }

  /** @test */
  public function test_user_can_debit_balance()
  {
    $user = UserFactory::new()->create();
    $user->credit(100);
    $this->assertEquals($user->balance, 100);
    $this->assertDatabaseCount('user_wallet_history', 1);
    $user->credit(50);
    $this->assertDatabaseCount('user_wallet_history', 2);
    $this->assertEquals($user->balance, 50);
  }

}