<?php

declare(strict_types=1);

namespace Axy\Wallet\Tests\Infra\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{
  /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
      'name',
      'email',
      'password',
  ];

   /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
      'password',
  ];
}