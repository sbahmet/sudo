<?php

namespace App\Providers\NumberConditions\ConcreteConditions;

use App\Providers\NumberConditions\BaseNumberCondition;
use App\Providers\NumberConditions\NumberConditionable;

class MultiplesOfThreeAndFive extends BaseNumberCondition implements NumberConditionable
{

    /**
     * @return bool
     */
    public function testCondition()
    {
        return
            (new MultiplesOfThree($this->number))->testCondition()
            &&
            (new MultiplesOfFive($this->number))->testCondition()
        ;
    }

    /**
     * @return string
     */
    public function getString()
    {
        return MultiplesOfThree::STRING . MultiplesOfFive::STRING;
    }
}