<?php

namespace AxySol\Wallet\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserWallet extends Model
{
    use HasFactory;

    protected $fillable = ['amount'];

    protected $table = 'user_wallets';

    public function walletable(): MorphTo
    {
        return $this->morphTo();
    }

    public function history(): HasMany
    {
        return $this->hasMany(UserWalletHistory::class,'wallet_id');
    }
}
