<?php

namespace App\Services;

use App\Contracts\Paymentgateway;

class Bankpayment implements Paymentgateway{
    public function charge($amount)
    {
        return "amount is paid via bank the amount is ".$amount;
    }
}