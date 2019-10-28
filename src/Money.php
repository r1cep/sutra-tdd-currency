<?php
declare(strict_types=1);

namespace App;

abstract class Money
{
    /**
     * @var int
     */
    protected $amount;

    /**
     * @param int $multiplier
     * @return Money
     */
    abstract public function times(int $multiplier): Money;

    /**
     * @param object $object
     * @return bool
     */
    public function equals(object $object): bool
    {
        $money = $object;
        return $this->amount === $money->amount
            && get_class($this) === get_class($money);
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function dollar(int $amount): Money
    {
        return new Dollar($amount);
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function franc(int $amount): Money
    {
        return new Franc($amount);
    }
}
