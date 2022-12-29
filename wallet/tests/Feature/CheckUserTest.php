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
}