<?php

namespace App\Providers\NumberConditions;


class BaseNumberCondition
{
    protected $number;

    public function __construct($number)
    {
        $this->number = $number;
    }
}