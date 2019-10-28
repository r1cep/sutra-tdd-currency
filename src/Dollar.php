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
     * @return $this
     */
    public function times(int $multiplier): self
    {
        return new self($this->amount * $multiplier);
    }
}
