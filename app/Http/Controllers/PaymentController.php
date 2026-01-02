<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Factories\PaymentFactory;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'method' => 'required|string|in:stripe,jazz,bank',
        ]);

        $gateway = PaymentFactory::make($request->method);

        $result = $gateway->charge($request->amount);

        return response()->json(['message' => $result]);
    }
}
