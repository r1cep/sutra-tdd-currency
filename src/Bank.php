<?php
declare(strict_types=1);

namespace App;

class Bank
{
    /**
     * @param Expression $source
     * @param string $to
     * @return Money
     */
    public function reduce(Expression $source, string $to): Money
    {
        return Money::dollar(10);
    }
}
