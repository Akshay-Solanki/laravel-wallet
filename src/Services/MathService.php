<?php
namespace Axy\Wallet\Services;

use function number_format;

class MathService implements MathServiceInterface {
  
  public function decimal(int|float $number, int $decimal = 2): float|int
  {
    // convert to float
    $num = (float) $number;

    $dec = (int) '1'.str_repeat('0',$decimal);
    
    $val =  ((int)($num * $dec))/$dec;

    return $val;
  }

  public function add(int|float $number1, int|float $number2,int $decimal = 2): float|int
  {
    $val = $this->decimal($number1,$decimal) + $this->decimal($number2,$decimal);

    return $this->decimal($val,$decimal);
  }

  public function subtract(int|float $number1, int|float $number2,int $decimal = 2): float|int
  {
    $val = $this->decimal($number1,$decimal) - $this->decimal($number2,$decimal);

    return $this->decimal($val,$decimal);
  }

}
