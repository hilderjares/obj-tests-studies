<?php

declare(strict_types=1);

namespace App\Game\Multiples\Specification;

interface Specification
{
    public function isSatisfiedBy(int $number): bool;
}
