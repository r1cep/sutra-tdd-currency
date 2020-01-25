<?php
declare(strict_types=1);

namespace App;

class Sum implements Expression
{
    /**
     * @var Expression
     */
    private $augend;

    /**
     * @var Expression
     */
    private $addend;

    /**
     * Sum constructor.
     * @param Expression $augend
     * @param Expression $addend
     */
    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    /**
     * @param Expression $addend
     * @return Expression
     */
    public function plus(Expression $addend): Expression
    {
        return $addend;
    }

    /**
     * @param Bank $bank
     * @param string $to
     * @return Money
     */
    public function reduce(Bank $bank, string $to): Money
    {
        $amount = $this->augend->reduce($bank, $to)->amount()
            + $this->addend->reduce($bank, $to)->amount();

        return new Money($amount, $to);
    }

    /**
     * @return Expression
     */
    public function augend(): Expression
    {
        return $this->augend;
    }

    /**
     * @return Expression
     */
    public function addend(): Expression
    {
        return $this->addend;
    }
}
