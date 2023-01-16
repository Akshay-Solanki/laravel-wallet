<?php
namespace Axy\Wallet\Services;

use Illuminate\Support\Str;
use Axy\Wallet\Models\UserWallet;
use Axy\Wallet\Models\UserWalletHistory;
use Axy\Wallet\Services\MathServiceInterface;
use Axy\Wallet\Exceptions\AttemptToNegetiveRechargeException;

class WalletService implements WalletServiceInterface{

  public function __construct(private MathServiceInterface $mathService) { }

  public function balance(UserWallet $wallet):float
  {
    return $this->mathService->decimal($wallet->amount);
  }

  public function credit(UserWallet $wallet, float|int $amount) :bool
  {
    //TODO: transaction code
    /* 
    1. check nagative amount check
    2. create transaction code after completed payment
    3. make events on credit on wallet 
    */
    
    if($amount <= 0){
      throw new AttemptToNegetiveRechargeException;
    }
    
    $wallet->history()->create([
      'amount'  =>  $amount,
      'type'    =>  UserWalletHistory::CREDIT,
      'transaction_id'  =>  Str::uuid()
    ]);

    $this->mathService->add($this->balance($wallet), $amount);
    $wallet->amount = $amount;
    return $wallet->save();
  }

  public function debit(UserWallet $wallet, float|int $amount) :bool
  {
    /* 
    2. check nagative balance after debit
    */
    if($amount <= 0){
      throw new AttemptToNegetiveRechargeException;
    }
    
    $wallet->history()->create([
      'amount'  =>  $amount,
      'type'    =>  UserWalletHistory::DEBIT,
      'transaction_id'  =>  Str::uuid()
    ]);
    //TODO: transaction code
    $this->mathService->subtract($this->balance($wallet), $amount);
    $wallet->amount = $amount;
    return $wallet->save();
  }

}