<?php
namespace AxySol\Wallet\Services;

use AxySol\Wallet\Models\UserWallet;

class CastService implements CastServiceInterface{

  public function getWallet(object $wallet): UserWallet
  {
    
    if(!($wallet instanceof UserWallet)){
      $wallet = $wallet->getAttribute('wallet');
      assert($wallet instanceof UserWallet);
    }

    if(!$wallet->exists){
      $wallet->saveQuietly();
    }
    
    return $wallet;

  }

}