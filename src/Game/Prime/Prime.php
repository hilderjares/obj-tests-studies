<?php

declare(strict_types=1);

namespace App\Game\Prime;

use App\Game\GameService;

final class Prime implements GameService
{
    private function isPrime(int $number): bool
    {
        if (1 >= $number) {
            return false;
        }

        if (2 === $number) {
            return true;
        }

        $numbers = range(2, $number - 1);

        foreach ($numbers as $testCase) {
            if (0 === $number % $testCase) {
                return false;
            }
        }

        return true;
    }

    public function play($number): bool
    {
        return $this->isPrime((int) $number);
    }
}
