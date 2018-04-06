<?php

namespace App\Providers;


class NumbersProvider
{
    protected $start;

    protected $finish;

    public function __construct(int $start = 1, int $finish = 100)
    {
        $this->start = $start;
        $this->finish = $finish;
    }

    public function each(Callable $closure)
    {
        for ($i = $this->start; $i <= $this->finish; $i++) {
            $closure($i);
        }
    }
}