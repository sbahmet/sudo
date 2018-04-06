<?php

namespace App\NumberHandlers;

use App\Providers\NumberConditions\ConcreteConditions\MultipleOfSeven;
use App\Providers\NumberConditions\ConcreteConditions\MultiplesOfFive;
use App\Providers\NumberConditions\ConcreteConditions\MultiplesOfThree;
use App\Providers\NumberConditions\ConcreteConditions\MultiplesOfThreeAndFive;
use App\Providers\NumberConditions\ConcreteConditions\SumOfDigitsIs7;
use App\Providers\NumberConditions\NumberConditionable;

class NumberHandler
{
    protected $number;


    public function __construct(int $n)
    {
        $this->number = $n;
    }

    public function getString()
    {
        $s= $this->number;

        foreach ($this->getConditionsClasses() as $class) {
            /**
             * @var NumberConditionable $tester
             */

            $tester = new $class($this->number);

            if ($tester->testCondition()) {
                $s = $tester->getString();
            }
        }

        return $s;
    }

    protected function getConditionsClasses()
    {
        // in order of priority desc
        return [
            SumOfDigitsIs7::class,

            MultiplesOfThree::class,
            MultiplesOfFive::class,

            // last: with max priority
            MultiplesOfThreeAndFive::class,
        ];
    }
}