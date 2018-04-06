<?php

namespace App\Services;

use App\NumberHandlers\NumberHandler;
use App\Providers\NumbersProvider;
use Illuminate\Http\Request;

class FizzBuzzService
{

    protected $start = 1;

    protected $finish = 100;

    protected $arr;

    public function setConfig(Request $request)
    {
        if ($request->has('start')) {

            $this->start = $request->get('start');
        }

        if ($request->has('finish')) {

            $this->finish = $request->get('finish');
        }

        return $this;
    }

    public function getResult()
    {
        (new NumbersProvider($this->start, $this->finish))->each([$this, 'handle']);

        return implode('<br>', $this->arr);
    }

    public function handle($number)
    {
        $this->arr[] = (new NumberHandler($number))->getString();
    }


}