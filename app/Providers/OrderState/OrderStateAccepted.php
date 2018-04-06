<?php

namespace App\Providers\OrderState;


class OrderStateAccepted implements OrderState
{

    public function create()
    {
        throw new \DomainException('Order cannot be created from accepted state');
    }

    public function accept()
    {
        throw new \DomainException('Order already accepted');
    }

    public function assemble()
    {
        return new OrderStateAssembling();
    }

    public function ship()
    {
        throw new \DomainException('Order cannot be shipping from accepted state');
    }

    public function finish()
    {
        throw new \DomainException('Order cannot be done from accepted state');
    }

    public function cancel()
    {
        return new OrderStateCancel();
    }
}