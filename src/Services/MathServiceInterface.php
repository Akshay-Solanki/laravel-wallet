<?php
namespace AxySol\Wallet\Services;

interface MathServiceInterface{

  public function decimal(int|float $number, int $decimal = 2): float|int;

  public function add(int|float $number1, int|float $number2,int $decimal = 2): float|int;
  
  public function subtract(int|float $number1, int|float $number2,int $decimal = 2): float|int;

}