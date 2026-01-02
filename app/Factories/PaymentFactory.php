<?php

namespace App\Factories;

use App\Contracts\Paymentgateway;
use App\Services\Bankpayment;
use App\Services\JazzPaymentService;
use App\Services\StripePayementSevice;

class PaymentFactory{

public static function make(string $method):Paymentgateway{
    return match($method){
        'stripe' => app(StripePayementSevice::class),
        'jazz' => app(JazzPaymentService::class),
        'bank' => app(Bankpayment::class)
        
    };
}



}
