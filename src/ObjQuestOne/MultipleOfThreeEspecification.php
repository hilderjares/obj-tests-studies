<?php

declare(strict_types=1);

namespace App\ObjQuestOne;

class MultipleOfThreeEspecification implements Specification
{
    private const NUMBER_THREE = 3;

    public function isSatisfiedBy(int $number): bool
    {
        return $number % self::NUMBER_THREE === 0;
    }
}
