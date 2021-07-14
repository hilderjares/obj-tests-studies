<?php

declare(strict_types=1);

namespace App\Game\Multiples;

use App\Game\Multiples\Specification\Specification;

class MultipleOfFiveSpecification implements Specification
{
    private const NUMBER_FIVE = 5;

    public function isSatisfiedBy(int $number): bool
    {
        return 0 === $number % self::NUMBER_FIVE;
    }
}
