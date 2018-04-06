<?php

namespace App\Providers\OrderState;


class Order
{
    /**
     * @var \App\Providers\OrderState\OrderState $state
     */
    
    protected $state;

    public function __construct()
    {
        $this->state = new OrderStateCreated();
    }

    public function accept()
    {
        $this->state = $this->state->accept();
    }

    public function assemble()
    {
        $this->state = $this->state->assemble();
    }

    public function ship()
    {
        $this->state = $this->state->ship();
    }

    public function finish()
    {
        $this->state = $this->state->finish();
    }

    public function cancel()
    {
        $this->state = $this->state->cancel();
    }
}