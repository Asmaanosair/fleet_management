<?php

namespace App\Enums;

 abstract  class SeatAvailable
{

     const NOT_AVAILABLE =false;
     const AVAILABLE = true;

     const SeatAvailable = [
         self::NOT_AVAILABLE => false,
         self::AVAILABLE => true,
     ];
}
