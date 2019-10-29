<?php
declare(strict_types=1);

namespace Tests\Unit;

use App\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    public function testManipulation(): void
    {
        $five = Money::dollar(5);
        // Javaと違ってequalsメソッドのオーバーライドがないのでTDD本と違う
        $this->assertTrue(Money::dollar(10)->equals($five->times(2)));
        $this->assertTrue(Money::dollar(15)->equals($five->times(3)));
    }

    public function testEquality(): void
    {
        $this->assertTrue((Money::dollar(5))->equals(Money::dollar(5)));
        $this->assertFalse((Money::dollar(5))->equals(Money::dollar(6)));
        $this->assertFalse((Money::franc(5))->equals(Money::dollar(5)));
    }

    public function testCurrency(): void
    {
        $this->assertEquals('USD', Money::dollar(1)->currency());
        $this->assertEquals('CHF', Money::franc(1)->currency());
    }
}
