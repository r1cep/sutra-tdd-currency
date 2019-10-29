<?php
declare(strict_types=1);

namespace App;

class Money implements Expression
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
    public function times(int $multiplier): Money
    {
        return new self($this->amount * $multiplier, $this->currency);
    }

    /**
     * @param Money $addend
     * @return Expression
     */
    public function plus(Money $addend): Expression
    {
        return new Sum($this, $addend);
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money
    {
        $rate = $bank->rate($this->currency, $to);
        return new Money($this->amount / $rate, $to);
    }

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
        /** @var Money $money */
        $money = $object;
        return $this->amount === $money->amount
            && $this->currency === $money->currency;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->amount . ' ' . $this->currency;
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function dollar(int $amount): Money
    {
        return new Money($amount, 'USD');
    }

    /**
     * @param int $amount
     * @return Money
     */
    public static function franc(int $amount): Money
    {
        return new Money($amount, 'CHF');
    }

    /**
     * @return int
     */
    public function amount(): int
    {
        return $this->amount;
    }
}
