# laravel-wallet
## 🚨 development in progress

## Installation 

```
composer require axy-sol/wallet
```

add trait in model

```
use Illuminate\Database\Eloquent\Model;
use AxySol\Wallet\Trait\HasWallet;

class User extends Model {
  use HasWallet;
```
