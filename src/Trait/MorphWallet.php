<?php

namespace Axy\Wallet\Trait;

use Axy\Wallet\Models\UserWallet;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait MorphWallet {
  public function wallet(): MorphOne
  {
    return $this->morphOne(UserWallet::class,'walletable');
  }
}