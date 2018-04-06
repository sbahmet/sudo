<?php

namespace App\Providers\OrderState;


class OrderStateShipping implements OrderState
{

    public function create()
    {
        throw new \DomainException('Order cannot be created from shipping state');
    }

    public function accept()
    {
        throw new \DomainException('Order cannot be accepted from shipping state');
    }

    public function assemble()
    {
        throw new \DomainException('Order cannot be assembling from shipping state');
    }

    public function ship()
    {
        throw new \DomainException('Order already shipping');
    }

    public function finish()
    {
        return new OrderStateDone();
    }

    public function cancel()
    {
        return new OrderStateCancel();
    }
}