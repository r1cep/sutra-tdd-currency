<?php
declare(strict_types=1);

namespace App;

class Dollar extends Money
{
    /**
     * @param int $multiplier
     * @return Money
     */
    public function times(int $multiplier): Money
    {
        return Money::dollar($this->amount * $multiplier);
    }
}
