<?php

namespace Axy\Wallet\Models;

use Illuminate\Database\Eloquent\Model;

class UserWalletHistory extends Model
{
    use HasFactory;
    protected $table = 'user_wallet_history';
}
