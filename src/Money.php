<?php
declare(strict_types=1);

namespace App;

class Money
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        $money = $object;
        return $this->amount === $money->amount;
    }
}
