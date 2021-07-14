<?php

declare(strict_types=1);

namespace App\Game\Multiples;

use App\Game\Multiples\Specification\Specification;

class MultipleOfThreeSpecification implements Specification
{
    private const NUMBER_THREE = 3;

    public function isSatisfiedBy(int $number): bool
    {
        return 0 === $number % self::NUMBER_THREE;
    }
}
