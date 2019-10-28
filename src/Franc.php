<?php
declare(strict_types=1);

namespace App;

class Franc
{
    /**
     * @var int
     */
    private $amount;

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

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        $franc = $object;
        return $this->amount === $franc->amount;
    }
}
