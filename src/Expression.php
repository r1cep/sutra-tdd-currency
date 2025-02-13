<?php
declare(strict_types=1);

namespace App;

interface Expression
{
    /**
     * @param int $multiplier
     * @return Expression
     */
    public function times(int $multiplier): Expression;

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression;

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money;
}
