<?php

declare(strict_types=1);

namespace App\ObjQuestOne;

class MultipleOfSevenEspecification implements Specification
{
    private const NUMBER_SEVEN = 7;

    public function isSatisfiedBy(int $number): bool
    {
        return $number % self::NUMBER_SEVEN === 0;
    }
}
