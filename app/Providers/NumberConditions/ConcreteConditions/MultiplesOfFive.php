<?php

namespace App\Providers\NumberConditions\ConcreteConditions;

use App\Providers\NumberConditions\MultiplesOfN;
use App\Providers\NumberConditions\NumberConditionable;

class MultiplesOfFive extends MultiplesOfN implements NumberConditionable
{
    const NUMBER = 5;

    const STRING = 'Buzz';
}