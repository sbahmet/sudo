<?php

namespace App\Providers\OrderState;

interface OrderState
{
    public function create();

    public function accept();

    public function assemble();

    public function ship();

    public function finish();

    public function cancel();

}