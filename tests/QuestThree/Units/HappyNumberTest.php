<?php

use App\ObjQuestThree\HappyNumber;
use PHPUnit\Framework\TestCase;

class HappyNumberTest extends TestCase
{
    protected function setUp(): void
    {
    }

    /**
     * @testdox Teste se o número é feliz
     */
    public function test_if_the_name_is_happy()
    {
        $happyNumber = new HappyNumber();

        $isHappy = $happyNumber->isHappy(7);

        $this->assertTrue($isHappy);
    }

    /**
     * @testdox Teste se o número não é feliz
     */
    public function test_if_the_name_not_is_happy()
    {
        $happyNumber = new HappyNumber();

        $isHappy = $happyNumber->isHappy(3);

        $this->assertFalse($isHappy);
    }
}
