<?php

use App\ObjQuestTwo\Domain\CartAggregate\Money;
use PHPUnit\Framework\TestCase;

class MoneyTest extends TestCase
{
    protected function setUp(): void
    {
    }

    /**
     * @testdox Teste se valor foi incrementado.
     */
    public function test_add_money()
    {   
        $money = new Money(0.0);
        $inital = $money->getAmount();

        $add50Cent = $money->addMoney(0.50);
        $newMoney = $add50Cent->getAmount();

        $this->assertFalse($inital === $newMoney);
    }
}
