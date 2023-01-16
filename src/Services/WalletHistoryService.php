<?php

namespace Axy\Wallet\Services;

use Axy\Wallet\Models\UserWalletHistory;

class WalletHistoryService implements WalletHistoryServiceInterface
{

  public function __construct(private UserWalletHistory $walletHistory){}

  public function addHistory(){

  }


}