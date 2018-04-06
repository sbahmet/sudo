<?php

namespace App\Providers\OrderState;


class OrderStateCancel implements OrderState
{

    public function create()
    {
        throw new \DomainException('Order cannot be created from cancel state');
    }

    public function accept()
    {
        throw new \DomainException('Order cannot be accepted from cancel state');
    }

    public function assemble()
    {
        throw new \DomainException('Order cannot be assembling from cancel state');
    }

    public function ship()
    {
        throw new \DomainException('Order cannot be shipping from cancel state');
    }

    public function finish()
    {
        throw new \DomainException('Order cannot be done from cancel state');
    }

    public function cancel()
    {
        throw new \DomainException('Order already canceled');
    }
}