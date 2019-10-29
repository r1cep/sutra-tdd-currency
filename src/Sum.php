<?php
declare(strict_types=1);

namespace App;

class Sum implements Expression
{
    /**
     * @var Money
     */
    private $augend;

    /**
     * @var Money
     */
    private $addend;

    /**
     * Sum constructor.
     * @param Money $augend
     * @param Money $addend
     */
    public function __construct(Money $augend, Money $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param string $to
     * @return Money
     */
    public function reduce(string $to): Money
    {
        $amount = $this->augend->amount() + $this->addend->amount();

        return new Money($amount, $to);
    }

    /**
     * @return Money
     */
    public function augend(): Money
    {
        return $this->augend;
    }

    /**
     * @return Money
     */
    public function addend(): Money
    {
        return $this->addend;
    }
}
