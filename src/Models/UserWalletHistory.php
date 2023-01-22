<?php

namespace AxySol\Wallet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserWalletHistory extends Model
{
    use HasFactory;
    protected $table = 'user_wallet_history';

    protected $fillable = [
      'wallet_id',
      'amount',
      'type',
      'transaction_id',
    ];

    const DEBIT = 'debit'; 
    const CREDIT = 'credit'; 
}
