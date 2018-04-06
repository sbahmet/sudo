<?php

namespace App\Providers\OrderState;

class OrderStateCreated implements OrderState
{

    public function create()
    {
        throw new \DomainException('Order already created');
    }

    public function accept()
    {
        return new OrderStateAccepted();
    }

    public function assemble()
    {
        throw new \DomainException('Order cannot be assembled from created state');
    }

    public function ship()
    {
        throw new \DomainException('Order cannot be shipping from created state');
    }

    public function finish()
    {
        throw new \DomainException('Order cannot be done from created state');
    }

    public function cancel()
    {
        return new OrderStateCancel();
    }
}