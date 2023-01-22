<?php
namespace AxySol\Wallet\Services;

use AxySol\Wallet\Models\UserWallet;

interface WalletServiceInterface{

  public function balance(UserWallet $wallet):float;
  
  public function credit(UserWallet $wallet, float|int $amount) :bool;
  
  public function debit(UserWallet $wallet, float|int $amount) :bool;
}