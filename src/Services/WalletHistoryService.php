<?php

namespace AxySol\Wallet\Services;

use AxySol\Wallet\Models\UserWalletHistory;

class WalletHistoryService implements WalletHistoryServiceInterface
{

  public function __construct(private UserWalletHistory $walletHistory){}

  public function addHistory(){

  }


}