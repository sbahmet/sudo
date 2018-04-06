<?php

namespace App\Providers\OrderState;


class OrderStateAssembling implements OrderState
{

    public function create()
    {
        throw new \DomainException('Order cannot be created from assembling state');
    }

    public function accept()
    {
        throw new \DomainException('Order cannot be accepted from assembling state');
    }

    public function assemble()
    {
        throw new \DomainException('Order already assembling');
    }

    public function ship()
    {
        return new OrderStateShipping();
    }

    public function finish()
    {
        throw new \DomainException('Order cannot be done from assembling state');
    }

    public function cancel()
    {
        return new OrderStateCancel();
    }
}