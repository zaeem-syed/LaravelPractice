<?php

namespace App\Contracts;

interface Paymentgateway
{
    //
    public function charge($amount);
    
}
