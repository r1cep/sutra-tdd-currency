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
     * @var string
     */
    protected $currency;

    /**
     * Money constructor.
     * @param int $amount
     * @param string $currency
     */
    public function __construct(int $amount, string $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }


    /**
     * @param int $multiplier
     * @return Money
     */
    abstract public function times(int $multiplier): Money;

    /**
     * @return string
     */
    public function currency(): string
    {
        return $this->currency;
    }

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
        return new Dollar($amount, 'USD');
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function franc(int $amount): Money
    {
        return new Franc($amount, 'CHF');
    }
}
