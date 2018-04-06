<?php

namespace App\Services;


use App\Providers\OrderState\Order;
use Illuminate\Http\Request;

class StateService
{
    public function getResult(Request $request)
    {
        $order = new Order();

        // dd($order);

        $order->accept();
        $order->assemble();
        $order->ship();
        $order->finish();

        // dd($order);

        $order->cancel(); // exception Order cannot be done from assembling state
    }
}