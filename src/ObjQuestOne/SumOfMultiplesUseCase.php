<?php

declare(strict_types=1);

namespace App\ObjQuestOne;

use App\ObjQuestOne\Specification;

final class SumOfMultiplesUseCase
{
    private Specification $specification;

    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function execute(int $rangeSize): int
    {
        $range = range(0, $rangeSize);

        return array_reduce(
            $range,
            fn ($accumulator, $number) => $this->specification->isSatisfiedBy($number) ? $accumulator += $number : $accumulator,
            0
        );
    }
}
