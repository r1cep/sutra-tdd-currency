<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Dollar;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testManipulation(): void
    {
        $five = new Dollar(5);
        $five->times(2);
        $this->assertEquals(10, $five->amount);
    }
}
