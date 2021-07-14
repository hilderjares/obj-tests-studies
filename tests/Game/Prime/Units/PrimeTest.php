<?php

declare(strict_types=1);

namespace Tests\Game\Prime\Units;

use App\Game\Prime\Prime;
use PHPUnit\Framework\TestCase;

class PrimeTest extends TestCase
{
    /**
     * @testdox Teste se dado um numero, ele é primo
     */
    public function test_if_number_is_prime()
    {
        $prime = new Prime();

        foreach ([2, 3, 5, 7] as $number) {
            $this->assertTrue($prime->play($number));
        }
    }

    /**
     * @testdox Teste se dado um numero, ele não é primo
     */
    public function test_if_number_not_is_prime()
    {
        $prime = new Prime();

        foreach ([1, 4, 6, 8] as $number) {
            $this->assertFalse($prime->play($number));
        }
    }
}
