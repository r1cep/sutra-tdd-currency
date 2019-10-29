<?php
declare(strict_types=1);

namespace App;

/**
 * NOTE
 * プロパティ$ratesはTDD本ではJavaのMapとHashMapを使っているが、PHPでは似たような実装ができない
 * SplObjectStorageで代用を検討したが、格納はできても取得の時にspl_object_hash()の値が違うので目的の値が取得できないため断念した
 */
class Bank
{
    /**
     * @var array
     */
    private $rates = [];

    /**
     * @param Expression $source
     * @param string $to
     * @return Money
     */
    public function reduce(Expression $source, string $to): Money
    {
        return $source->reduce($this, $to);
    }

    /**
     * @param string $from
     * @param string $to
     * @param int $rate
     */
    public function addRate(string $from, string $to, int $rate): void
    {
        $this->rates[(new Pair($from, $to))->hashCode()] = $rate;
    }

    /**
     * @param string $from
     * @param string $to
     * @return int
     */
    public function rate(string $from, string $to): int
    {
        if ($from === $to) {
            return 1;
        }

        return $this->rates[(new Pair($from, $to))->hashCode()];
    }
}
