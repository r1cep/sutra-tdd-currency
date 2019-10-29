<?php
declare(strict_types=1);

namespace App;

interface Expression
{
    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money;
}
