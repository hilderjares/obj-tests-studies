<?php

declare(strict_types=1);

namespace App\ObjQuestOne;

class NotSpecification implements Specification
{
    private Specification $specification;

    public function __construct(Specification $specification)
    {
        $this->specification = $specification;
    }

    public function isSatisfiedBy(int $number): bool
    {
        return !$this->specification->isSatisfiedBy($number);
    }
}
