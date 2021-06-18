<?php

declare(strict_types=1);

namespace App\ObjQuestOne;

class MultipleOfFiveSpecification implements Specification
{
    private const NUMBER_FIVE = 5;

    public function isSatisfiedBy(int $number): bool
    {
        return $number % self::NUMBER_FIVE === 0;
    }
}
