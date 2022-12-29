<?php

namespace Axy\Wallet\Trait;

use Axy\Wallet\Models\UserWallet;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasWallet {

    public function getWallet() : MorphOne
    {
        return $this->morphOne(UserWallet::class,'walletable');
    }


    public function getAmount(): Attribute
    {
        return Attribute::make(
            get: fn($value) =>  (((int)($value * 100))/100),
            set: fn($value) =>  (((int)($value * 100))/100),
        );
    }


    public function getWalletBalance()
    {
        if(!$this->getWallet){
            return $this->createWallet()->amount;
        }
        return $this->getWallet->amount;
    }

    public function createWallet()
    {
        return $this->getWallet()->create(['amount' => 0 ]);
    }
}

