<?php
declare(strict_types=1);

namespace App;

class Dollar
{
    /**
     * @var int
     */
    public $amount;

    public function __construct(int $amount)
    {
        $this->amount = $amount;
    }

    /**
     * @param int $multiplier
     */
    public function times(int $multiplier): void
    {
        $this->amount *= $multiplier;
    }
}
