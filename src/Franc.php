<?php
declare(strict_types=1);

namespace App;

class Franc extends Money
{
    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier);
    }
}
