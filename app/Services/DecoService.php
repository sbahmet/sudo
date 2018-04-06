<?php

namespace App\Services;

use App\Providers\Decorators\Vodka;
use App\Providers\Decorators\Liquor;
use App\Providers\Decorators\LemonJuice;

class DecoService
{
    public function getResult()
    {
        return (new Vodka(new LemonJuice(new Liquor)))->getComponentsNames()
            .'<br>'
            .(new LemonJuice(new Liquor(new Liquor(new Vodka))))->getComponentsNames();
        ;
    }
}