<?php

namespace App\Providers\Decorators;


abstract class Beverage
{
    protected $component;

    public function __construct(Beverage $beverage = null)
    {
        $this->component = $beverage;
    }

    public function getComponentsNames()
    {
        $componentName = $this->component ? $this->component->getComponentsNames() : '';

        return $this->getName() .', '. $componentName;
    }

    abstract protected function getName();
}