<?php

namespace App\Providers\NumberConditions;


interface NumberConditionable
{
    /**
     * @return bool
     */
    public function testCondition();

    /**
     * @return string
     */
    public function getString();

}