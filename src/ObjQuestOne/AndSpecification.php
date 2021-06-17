<?php 

declare(strict_types=1);

namespace App\ObjQuestOne;

class AndSpecification implements Specification
{
    private array $specifications;

    public function __construct(Specification ...$specifications)
    {
        $this->specifications = $specifications;
    }

    public function isSatisfiedBy(int $number): bool
    {
        foreach ($this->specifications as $specification) {
            if (!$specification->isSatisfiedBy($number)) {
                return false;
            }
        }

        return true;
    }
}