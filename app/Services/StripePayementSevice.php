<?php

namespace App\Services;

use App\Contracts\Paymentgateway;

class StripePayementSevice implements Paymentgateway{
    public function charge($amount)
    {
        return "the amount is paid via Stripe".$amount;
    }
}






