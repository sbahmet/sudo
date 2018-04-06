<?php

namespace App\Providers\NumberConditions\ConcreteConditions;

use App\Providers\NumberConditions\MultiplesOfN;
use App\Providers\NumberConditions\NumberConditionable;

class MultiplesOfThree extends MultiplesOfN implements NumberConditionable
{
    const NUMBER = 3;

    const STRING = 'Fizz';
}