<?php

namespace App\Providers\NumberConditions;


abstract class MultiplesOfN extends BaseNumberCondition implements NumberConditionable
{

    /**
     * @return bool
     */
    public function testCondition()
    {
        if (!defined('static::NUMBER')) {
            throw new \DomainException('const NUMBER must be defined in class: '.static::class);
        }

        return $this->number % static::NUMBER == 0;
    }

    public function getString()
    {
        if (!defined('static::STRING')) {
            throw new \DomainException('const STRING must be defined in class: '.static::class);
        }

        return static::STRING;
    }
}