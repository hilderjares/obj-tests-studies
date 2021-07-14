<?php

declare(strict_types=1);

namespace Tests\Ecommerce\Domain\Units\Cart;

use App\Ecommerce\Domain\Cart\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    /**
     * @testdox Teste se valor foi incrementado.
     */
    public function test_add_money()
    {   
        $money = new Money(0.0);
        $initial = $money->getAmount();

        $add50Cent = $money->addMoney(0.50);
        $newMoney = $add50Cent->getAmount();

        $this->assertNotEquals($initial, $newMoney);
        $this->assertEquals(0.50, $newMoney);
    }
}
