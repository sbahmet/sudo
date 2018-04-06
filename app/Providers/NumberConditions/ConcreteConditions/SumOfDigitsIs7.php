<?php

namespace App\Providers\NumberConditions\ConcreteConditions;


use App\Providers\NumberConditions\BaseNumberCondition;
use App\Providers\NumberConditions\NumberConditionable;

class SumOfDigitsIs7 extends BaseNumberCondition implements NumberConditionable
{

    const STRING = 'Drink a Shot';

    /**
     * @return bool
     */
    public function testCondition()
    {
        return collect(str_split($this->number))->sum() == 7;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->number .' '. self::STRING;
    }
}