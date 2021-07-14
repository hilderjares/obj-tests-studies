<?php

declare(strict_types=1);

namespace Tests\Game\HappyNumber\Units;

use App\Game\HappyNumber\HappyNumber;
use PHPUnit\Framework\TestCase;

class HappyNumberTest extends TestCase
{
    private HappyNumber $happy;

    protected function setUp(): void
    {
        $this->happy = new HappyNumber();
    }

    /**
     * @testdox Teste se o número é feliz
     */
    public function test_if_the_name_is_happy()
    {
        $isHappy = $this->happy->play(7);

        $this->assertTrue($isHappy);
    }

    /**
     * @testdox Teste se o número não é feliz
     */
    public function test_if_the_name_not_is_happy()
    {
        $isHappy = $this->happy->play(3);

        $this->assertFalse($isHappy);
    }
}
