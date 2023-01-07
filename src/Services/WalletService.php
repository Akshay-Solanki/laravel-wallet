<?php
namespace Axy\Wallet\Services;

use Axy\Wallet\Models\UserWallet;
use Axy\Wallet\Services\MathServiceInterface;

class WalletService implements WalletServiceInterface{

  public function __construct(private MathServiceInterface $mathService) { }

  public function balance(UserWallet $wallet):float
  {
    return $this->mathService->decimal($wallet->amount);
  }

  public function credit(UserWallet $wallet, float|int $amount) :bool
  {
    //TODO: transaction code

    $this->mathService->add($this->balance($wallet), $amount);
    $wallet->amount = $amount;
    return $wallet->save();
  }

  public function debit(UserWallet $wallet, float|int $amount) :bool
  {

    //TODO: transaction code
    $this->mathService->subtract($this->balance($wallet), $amount);
    $wallet->amount = $amount;
    return $wallet->save();
  }

}