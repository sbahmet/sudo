<?php

namespace App\Providers\OrderState;


class OrderStateDone implements OrderState
{

    public function create()
    {
        throw new \DomainException('Order cannot be created from done state');
    }

    public function accept()
    {
        throw new \DomainException('Order cannot be accepted from done state');
    }

    public function assemble()
    {
        throw new \DomainException('Order cannot be assembling from done state');
    }

    public function ship()
    {
        throw new \DomainException('Order cannot be shipping from done state');
    }

    public function finish()
    {
        throw new \DomainException('Order already done');
    }

    public function cancel()
    {
        throw new \DomainException('Order cannot be canceled from done state');
    }
}