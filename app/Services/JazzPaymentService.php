<?php
 namespace App\Services;

use App\Contracts\Paymentgateway;

 class JazzPaymentService implements Paymentgateway{
    public function charge($amount)
    {
        return "the amount is paid via".$amount."jazz cash";
    }
 }