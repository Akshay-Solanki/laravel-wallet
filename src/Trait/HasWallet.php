<?php

namespace AxySol\Wallet\Trait;

use AxySol\Wallet\Models\UserWallet;
use AxySol\Wallet\Services\CastServiceInterface;
use AxySol\Wallet\Services\WalletServiceInterface;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasWallet {

    public function wallet() : MorphOne
    {
        return $this->morphOne(UserWallet::class,'walletable')
          ->withDefault(static function(UserWallet $wallet, object $model){
            $wallet->forceFill([
              'amount' =>  0,
              'status' =>  'active',
            ]);

            if ($model->exists) {
               $wallet->setRelation('walletable', $model->withoutRelations());
            }
          });
    }

    public function getBalanceAttribute()
    {
      return app(WalletServiceInterface::class)->balance(app(CastServiceInterface::class)->getWallet($this));
    }

    public function credit($amount)
    {
      return app(WalletServiceInterface::class)->credit(app(CastServiceInterface::class)->getWallet($this), $amount);
    }

}

