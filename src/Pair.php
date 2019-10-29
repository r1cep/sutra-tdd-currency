<?php
declare(strict_types=1);

namespace App;

class Pair
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * Pair constructor.
     * @param string $from
     * @param string $to
     */
    public function __construct(string $from, string $to)
    {
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @param Pair $other
     * @return bool
     */
    public function equals(self $other): bool
    {
        return $this->from === $other->from && $this->to === $other->to;
    }

    /**
     * @return int
     */
    public function hashCode(): int
    {
        return 0;
    }
}
