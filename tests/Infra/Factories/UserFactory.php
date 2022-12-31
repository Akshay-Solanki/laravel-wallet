<?php

declare(strict_types=1);

namespace Axy\Wallet\Tests\Infra\Factories;

use Axy\Wallet\Tests\Infra\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @throws
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'password' => bcrypt('secret'),
            'email' => $this->faker->unique()
                ->safeEmail,
        ];
    }
}